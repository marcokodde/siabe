<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CatPeriodController extends Controller
{
    public function index(Request $request)
    {
        return view('cat_periods.index');
    }
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Period::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
        $data = Period::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
    }
    public function get_all(Request $request)
    {
        if ($request->ajax()) {
            $data = Period::orderBy('date', 'asc')->get();
            return response()->json($data, 200);
        }
        return response()->json([], 500);
    }
    public function get(Request $request)
    {
        if ($request->ajax()) {
            $period = Period::find($request->id);
            return response()->json($period);
        }
    }
    public function add(Request $request)
    {
        if ($request->ajax()) {
            $period = Period::create([
                'date' => $request->date,
                'active' => $request->active != null ? true : false,
            ]);
            return response()->json($period);
        }
    }
    public function save(Request $request)
    {
        if ($request->ajax()) {
            $period = Period::find($request->id);
            $period->date = $request->date;
            $period->active =  $request->active != null ? true : false;
            $period->save();
            return response()->json($period);
        }
    }
    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $period = Period::find($request->id);
            if( $period != null ){
                $period->delete();
            }
            return response()->json($period);
        }
    }
}
