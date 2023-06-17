<?php

namespace App\Http\Controllers;

use App\Models\CategoryKpi;
use App\Models\CategoryKpiUser;
use App\Models\KpiPeriodUser;
use App\Models\Period;
use App\Models\PeriodCategoryKpi;
use App\Models\PeriodUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ThermometerController extends Controller
{
    //
    public function index(Request $request)
    {
        $category_kpis = CategoryKpi::where(['active' => 1, 'type' => 2])->with('kpis')->get();
        // return $category_kpis;
        $data = [
            "category_kpis" => $category_kpis
        ];
        return view('thermometer.index', $data);
    }
    public function period(Request $request)
    {
        Carbon::setLocale('es');
        // Carbon::setUTF8(true);
        Carbon::setLocale(config('app.locale'));
        setlocale(LC_ALL, 'es_MX', 'es', 'ES', 'es_MX.utf8');
        $user = Auth::user();
        $period_user = Period::where(['active' => 1, 'type' => 2])
            ->orderByDesc('periods.date')
            ->paginate(50);
        foreach ($period_user->items() as $key => $period) {
            $period->period_user = PeriodUser::where(['period_id' => $period->id])->first();
        }
        // return response()->json($period_user->items());
        $data = [
            'period_users_paginate' => $period_user,
            'type' => 2,
        ];
        return view('period_user.index', $data);
        // return view('thermometer.show');
        # code...
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

        $period_category_kpis = DB::table('period_category_kpis')
            ->join('category_kpis', 'period_category_kpis.category_kpi_id', '=', 'category_kpis.id', 'left')
            ->where(['period_category_kpis.period_id' => $period_id, 'category_kpis.type' => 2])
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
        return view('period_user.show', ['period_category_kpis' => $pck, 'type' => 2]);
    }
}
