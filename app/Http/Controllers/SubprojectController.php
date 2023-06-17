<?php

namespace App\Http\Controllers;

use App\Models\Subproject;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubprojectController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('subprojects.index');
    }
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Subproject::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }
    public function get(Request $request)
    {
        if ($request->ajax()) {
            $Subproject = Subproject::find($request->id);
            return response()->json($Subproject);
        }
    }
    public function add(Request $request)
    {
        if ($request->ajax()) {
            $Subproject = Subproject::create([
                'name' => $request->name,
                'description' => $request->description,
                'active' => $request->active != null ? true : false,
            ]);
            return response()->json($Subproject);
        }
    }
    public function save(Request $request)
    {
        if ($request->ajax()) {
            $Subproject = Subproject::find($request->id);
            $Subproject->name = $request->name;
            $Subproject->description = $request->description;
            $Subproject->active =  $request->active != null ? true : false;
            $Subproject->save();
            return response()->json($Subproject);
        }
    }
    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $Subproject = Subproject::find($request->id);
            if( $Subproject != null ){
                $Subproject->delete();
            }
            return response()->json($Subproject);
        }
    }
}
