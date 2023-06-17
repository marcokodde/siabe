<?php

namespace App\Http\Controllers;

use App\Models\CategoryKpi;
use App\Models\Kpi;
use App\Models\Period;
use App\Models\PeriodCategoryKpi;
use App\Models\PeriodKpi;
use Illuminate\Http\Request;

class PeriodCategoryKpiController extends Controller
{
    //
    public function add(Request $request)
    {
        $periods = Period::where(['active' => true])->get();
        $category_kpis = CategoryKpi::where(['active' => true])->get();
        foreach ($periods as $kp => $period) {
            foreach ($category_kpis as $kck => $category_kpi) {
                $period_category_kpi = PeriodCategoryKpi::where([
                    'period_id' => $period->id,
                    'category_kpi_id' => $category_kpi->id,
                ])->first();
                if ($period_category_kpi == null ){
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

                    if($period_kpi == null){
                        $period_kpi = PeriodKpi::create([
                            'period_category_kpi_id' => $period_category_kpi->id,
                            'kpi_id' => $kpi->id,
                        ])->first();
                    }
                }
                
            }
        }
        return response()->json($periods);
    }
}
