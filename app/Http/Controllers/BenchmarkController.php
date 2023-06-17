<?php

namespace App\Http\Controllers;

use App\Models\CategoryKpi;
use App\Models\Kpi;
use App\Models\KpiPeriodUser;
use App\Models\MeasuringUnit;
use App\Models\Period;
use App\Models\PeriodUser;
use App\Models\User;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BenchmarkController extends Controller
{
    //
    public function dashboard(Request $request)
    {
        return view('benchmark.dashboard');
    }

    public function statistics(Request $request)
    {
        $user = Auth::user();
        $category_kpi = CategoryKpi::where(['field_name' => $request->category, 'active' => true])->first();
        if ($category_kpi == null)  abort(404);
        $kpis = Kpi::where(['category_kpi_id' => $category_kpi->id, 'active' => true])->get();
        // if ($kpis == null)  abort(404);

        $paginated = Period::where(['active' => 1, 'type' => $category_kpi->type])->orderBy('date', 'desc')->paginate(6);
        $periods = $paginated->items();
        $periods_name = [];
        $data_kpis = [];

        foreach ($periods as $key => $period) {
            $periods_name[] = $this->DateMonth($period->date);
        }
        foreach ($kpis as $ki => $kpi) {
            $measuring_unit = MeasuringUnit::find($kpi->measuring_unit_id);
            $kpis_user = [];
            $kpi_avg = [];
            foreach ($periods as $key => $period) {
                $user_values = DB::table('kpi_period_users')
                    ->join('period_users', 'kpi_period_users.period_user_id', '=', 'period_users.id')
                    ->join('periods', 'period_users.period_id', '=', 'periods.id')
                    ->where(['periods.id' => $period->id, 'kpi_period_users.kpi_id' => $kpi->id, 'period_users.user_id' => $user->id])
                    ->select('kpi_period_users.*')
                    ->avg('value')
                    // ->get()
                ;
                if ($user_values != null )
                    $kpis_user[] = floatval($user_values);
                else 
                    $kpis_user[] = 0;
                if ($user_values != null) {
                    $all_values = DB::table('kpi_period_users')
                        ->join('period_users', 'kpi_period_users.period_user_id', '=', 'period_users.id')
                        ->join('periods', 'period_users.period_id', '=', 'periods.id')
                        ->where(['periods.id' => $period->id, 'kpi_period_users.kpi_id' => $kpi->id])
                        ->select('kpi_period_users.*')
                        ->avg('value')
                        // ->get()
                    ;
                    $kpi_avg[] = floatval($all_values);
                } else
                    $kpi_avg[] = 0;
            }
            $data_kpis[] = ['field_name' => $kpi->field_name, 
            'measuring' => $measuring_unit ,
            'first' => $kpis_user, 'second' => $kpi_avg];
        }
        $data = [
            'periods' => $periods_name,
            'kpis' => $data_kpis,
        ];
        return response()->json($data);
    }
    private function DateMonth($date)
    {
        return (new \Carbon\Carbon($date, new DateTimeZone('America/Mexico_City')))->format('m/y');
    }
}
