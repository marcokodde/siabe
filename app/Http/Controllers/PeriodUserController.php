<?php

namespace App\Http\Controllers;

use App\Models\CategoryKpi;
use App\Models\CategoryKpiUser;
use App\Models\Kpi;
use App\Models\KpiPeriodUser;
use App\Models\Period;
use App\Models\PeriodCategoryKpi;
use App\Models\PeriodKpi;
use App\Models\PeriodUser;
use Carbon\Carbon;
use Database\Seeders\PeriodKpiSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeriodUserController extends Controller
{
    //
    public function index(Request $request)
    {
        Carbon::setLocale('es');
        // Carbon::setUTF8(true);
        Carbon::setLocale(config('app.locale'));
        setlocale(LC_ALL, 'es_MX', 'es', 'ES', 'es_MX.utf8');
        $user = Auth::user();
        $periods = Period::where(['active' => 1, 'type' => 1])
            ->orderByDesc('periods.date')
            ->paginate(50);
        foreach ($periods->items() as $key => $period) {
            $period->period_user = PeriodUser::where(['user_id' => $user->id, 'period_id' => $period->id])->first();
        }
        // return response()->json($periods->items());
        $data = [
            'period_users_paginate' => $periods,
            'type' => 1,
        ];
        // return response()->json($periods);
        return view('period_user.index', $data);
    }
    public function add(Request $request)
    {
        $user = Auth::user();
        $category_kpi_user = CategoryKpiUser::where(['period_category_kpi_id' => $request->period_category_kpi_id, 'user_id' => $user->id])->first();
        if ($category_kpi_user == null) {
            $category_kpi_user = CategoryKpiUser::create(['period_category_kpi_id' => $request->period_category_kpi_id, 'user_id' => $user->id, 'status' => 2]);
        }
        // $period_category_kpi = PeriodCategoryKpi::where(['id' => $category_kpi_user->period_category_kpi_id])->first();
        // $category_kpi = CategoryKpi::find($period_category_kpi->category_kpi_id);
        foreach ($request->kpis as $key => $kpi) {
            $kpi_period_user = KpiPeriodUser::where(['period_user_id' => $request->period_user_id, 'kpi_id' => $kpi['kpi_id']])->first();
            if ($kpi_period_user == null) {
                $kpi_period_user = KpiPeriodUser::create([
                    'period_user_id' => $request->period_user_id,
                    'kpi_id' => $kpi['kpi_id'],
                    'value' => $kpi['value'],
                ]);
            }
            else {
                $kpi_period_user->value = $kpi['value'] ? $kpi['value'] : null;
                $kpi_period_user->save();
            }
        }

        return response()->json(['success' => true, 'data' => $request->kpis]);
    }
    public function get(Request $request)
    {
        $user = Auth::user();
        $category_kpi_users = DB::table('period_category_kpis')
            ->join('category_kpis', 'period_category_kpis.category_kpi_id', '=', 'category_kpis.id')
            ->join('category_kpi_users', 'category_kpi_users.period_category_kpi_id', '=', 'period_category_kpis.id', 'left')
            ->whereRaw('period_category_kpis.period_id = ? AND category_kpis.type = ? AND (category_kpi_users.user_id is null or category_kpi_users.user_id = ?)', [$request->period, 2, $user->id])
            ->select('category_kpi_users.*')
            ->get();
        return $category_kpi_users;
        $period_category_kpis = PeriodCategoryKpi::where(['period_id' => $request->period])->get();
        return $period_category_kpis;
    }
    public function show($period_id)
    {
        $user = Auth::user();
        $period = Period::findOrFail($period_id);
        $period_user = PeriodUser::where(['period_id' => $period_id, 'user_id' => $user->id])->first();
        if ($period_user == null) {
            $period_user = PeriodUser::create([
                'user_id' => $user->id,
                'period_id' => $period->id,
            ]);
        }
        // $period_category_kpis = PeriodCategoryKpi::where(['period_id' => $period_id])->get();
        $period_category_kpis = DB::table('period_category_kpis')
            ->join('category_kpis', 'period_category_kpis.category_kpi_id', '=', 'category_kpis.id', 'left')
            ->where(['period_category_kpis.period_id' => $period_id, 'category_kpis.type' => 1])
            ->select('period_category_kpis.*')
            ->get();

        $pck = [];

        foreach ($period_category_kpis as $key => $period_category_kpi) {
            $category_kpi = CategoryKpi::find($period_category_kpi->category_kpi_id);
            $category_kpi_user = CategoryKpiUser::where(['period_category_kpi_id' => $period_category_kpi->id, 'user_id' => $user->id])->first();

            $k = [];
            $kpis = DB::table('period_kpis')
                ->join('kpis', 'period_kpis.kpi_id', '=', 'kpis.id')
                ->join('measuring_units', 'kpis.measuring_unit_id', '=', 'measuring_units.id', 'left')
                ->where(['period_kpis.period_category_kpi_id' => $period_category_kpi->id])
                ->select('kpis.*', 'measuring_units.name as measuring_unit_name', 'measuring_units.sign as measuring_unit_sign')
                ->get();

            foreach ($kpis as $keyk => $kpi) {
                $kpi_period_user = KpiPeriodUser::where(['period_user_id' => $period_user->id, 'kpi_id' => $kpi->id])->first();
                $k[] = (object) [
                    'id' => $kpi->id,
                    'name' => $kpi->name,
                    'category_kpi_id' => $kpi->category_kpi_id,
                    'kpi_period_user_id' => $kpi_period_user == null ? null : $kpi_period_user->id,
                    'value' => $kpi_period_user == null ? null : $kpi_period_user->value,
                    'measuring_unit_name' => $kpi->measuring_unit_name,
                    'measuring_unit_sign' => $kpi->measuring_unit_sign,
                ];
            }

            $foo = [
                'id' =>  $category_kpi->id,
                'period_id' => $period_id,
                'name' =>  $category_kpi->name,
                'category_kpi_user_id' => $category_kpi_user == null ? null : $category_kpi_user->id,
                'status' => $category_kpi_user == null ? null : $category_kpi_user->status,
                'period_category_kpi_id' => $period_category_kpi->id,
                'period_user_id' => $period_user->id,
                'kpis' => $k,
            ];
            $pck[] = (object) $foo;
        }
        // return $pck;
        return view('period_user.show', ['period_category_kpis' => $pck, 'type' => 1]);
    }
    public function insert_kpis()
    {
        $periods = Period::where(['type' => 1, 'active' => true])->get();
        $category_kpis = CategoryKpi::where(['type' => 1, 'active' => true])->get();
        foreach ($periods as $kp => $period) {
            foreach ($category_kpis as $kck => $category_kpi) {
                $period_category_kpi = PeriodCategoryKpi::where([
                    'period_id' => $period->id,
                    'category_kpi_id' => $category_kpi->id,
                ])->first();
                if ($period_category_kpi == null) {
                    $period_category_kpi = PeriodCategoryKpi::create([
                        'period_id' => $period->id,
                        'category_kpi_id' => $category_kpi->id,
                    ]);
                }

                $kpis = Kpi::where(['active' => true, 'category_kpi_id' => $category_kpi->id])->get();

                foreach ($kpis as $keyk => $kpi) {
                    $period_kpi = PeriodKpi::where([
                        'period_category_kpi_id' => $period_category_kpi->id,
                        'kpi_id' => $kpi->id,
                    ])->first();

                    if ($period_kpi == null) {
                        $period_kpi = PeriodKpi::create([
                            'period_category_kpi_id' => $period_category_kpi->id,
                            'kpi_id' => $kpi->id,
                        ])->first();
                    }
                }
            }
        }

        $periods = Period::where(['type' => 2, 'active' => true])->get();
        $category_kpis = CategoryKpi::where(['type' => 2, 'active' => true])->get();
        foreach ($periods as $kp => $period) {
            foreach ($category_kpis as $kck => $category_kpi) {
                $period_category_kpi = PeriodCategoryKpi::where([
                    'period_id' => $period->id,
                    'category_kpi_id' => $category_kpi->id,
                ])->first();
                if ($period_category_kpi == null) {
                    $period_category_kpi = PeriodCategoryKpi::create([
                        'period_id' => $period->id,
                        'category_kpi_id' => $category_kpi->id,
                    ]);
                }

                $kpis = Kpi::where(['active' => true, 'category_kpi_id' => $category_kpi->id])->get();

                foreach ($kpis as $keyk => $kpi) {
                    $period_kpi = PeriodKpi::where([
                        'period_category_kpi_id' => $period_category_kpi->id,
                        'kpi_id' => $kpi->id,
                    ])->first();

                    if ($period_kpi == null) {
                        $period_kpi = PeriodKpi::create([
                            'period_category_kpi_id' => $period_category_kpi->id,
                            'kpi_id' => $kpi->id,
                        ])->first();
                    }
                }
            }
        }
    }
}
