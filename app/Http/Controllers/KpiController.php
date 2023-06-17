<?php

namespace App\Http\Controllers;

use App\Models\Kpi;
use Illuminate\Http\Request;
use Spatie\FlareClient\Http\Exceptions\NotFound;
use Yajra\DataTables\Facades\DataTables;

class KpiController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('kpis.index');
    }
    public function list(Request $request)
    {
        $data = Kpi::latest()->with('category_kpi');
        return DataTables::eloquent($data)
            ->addIndexColumn()
            ->addColumn('category_kpi', function (Kpi $kpi) {
                return $kpi->category_kpi->name;
            })
            ->toJson();
        if ($request->ajax()) {
        }
    }
    public function get(Request $request)
    {
        if ($request->ajax()) {
            $kpi = Kpi::find($request->id);
            return response()->json($kpi);
        }
    }
    public function add(Request $request)
    {
        if ($request->ajax()) {
            $kpi = Kpi::create([
                'name' => $request->name,
                'field_name' => $request->name,
                'category_kpi_id' => $request->category_kpi_id,
                'active' => $request->active != null ? true : false,
            ]);
            return response()->json($kpi);
        }
    }
    public function save(Request $request)
    {
        if ($request->ajax()) {
            $kpi = Kpi::find($request->id);
            $kpi->name = $request->name;
            $kpi->field_name = $request->field_name;
            $kpi->category_kpi_id = $request->category_kpi_id;
            $kpi->active =  $request->active != null ? true : false;
            $kpi->save();
            return response()->json($kpi);
        }
    }
    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $kpi = Kpi::find($request->id);
            if ($kpi != null) {
                $kpi->delete();
            }
            return response()->json($kpi);
        }
    }
}
