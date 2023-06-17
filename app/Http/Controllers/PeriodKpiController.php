<?php

namespace App\Http\Controllers;

use App\Models\Kpi;
use App\Models\Period;
use App\Models\PeriodKpi;
use App\Models\PeriodUser;
use Illuminate\Http\Request;

class PeriodKpiController extends Controller
{
    public function add(Request $request)
    {
        $periods = Period::where(['active' => true])->get();
        $kpis = Kpi::where(['active' => true])->get();
        foreach ($periods as $kp => $period) {
            foreach ($kpis as $kk => $kpi) {
                $period_kpi = PeriodKpi::where([
                    'period_id' => $period->id,
                    'kpi_id' => $kpi->id,
                ])->first();
                if ($period_kpi == null ){
                    PeriodKpi::create([
                        'period_id' => $period->id,
                        'kpi_id' => $kpi->id,
                    ]);
                }
                
            }
        }
        return response()->json($periods);
    }
}
