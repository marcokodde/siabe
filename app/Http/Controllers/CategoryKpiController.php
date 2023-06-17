<?php

namespace App\Http\Controllers;

use App\Models\CategoryKpi;
use Illuminate\Http\Request;

class CategoryKpiController extends Controller
{
    //
    public function list(Request $request)
    {
        
    }
    public function all()
    {
        $category_kpis = CategoryKpi::where(['active' => true])->get();
        return response()->json($category_kpis);
    }
}
