<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BenefitController extends Controller
{
    public function index(Request $request)
    {
        return view('benefits.index');
    }
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Benefit::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
        $data = Benefit::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
    }
    public function get_all(Request $request)
    {
        if ($request->ajax()) {
            $data = Benefit::orderBy('name', 'asc')->get();
            return response()->json($data, 200);
        }
        return response()->json([], 500);
    }
    public function get(Request $request)
    {
        if ($request->ajax()) {
            $benefit = Benefit::find($request->id);
            return response()->json($benefit);
        }
    }
    public function add(Request $request)
    {
        if ($request->ajax()) {
            $benefit = Benefit::create([
                'name' => $request->name,
                'active' => $request->active != null ? true : false,
            ]);
            return response()->json($benefit);
        }
    }
    public function save(Request $request)
    {
        if ($request->ajax()) {
            $benefit = Benefit::find($request->id);
            $benefit->name = $request->name;
            $benefit->active =  $request->active != null ? true : false;
            $benefit->save();
            return response()->json($benefit);
        }
    }
    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $benefit = Benefit::find($request->id);
            if( $benefit != null ){
                $benefit->delete();
            }
            return response()->json($benefit);
        }
    }
}
