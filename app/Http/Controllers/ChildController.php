<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Gender;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Js;
use Yajra\DataTables\Facades\DataTables;

class ChildController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('children.index');
    }
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Child::latest()->with('child_gender')->with('child_type')->with('subproject')
            ;
            return DataTables::eloquent($data)
                ->addColumn('child_gender', function (Child $child) {
                    return $child->child_gender->name;
                })
                ->addColumn('child_type', function (Child $child) {
                    return $child->child_type->name;
                })
                ->addColumn('subproject', function (Child $child) {
                    return $child->subproject->name;
                })
                ->addColumn('age', function(Child $child) {
                    return Carbon::parse($child->birthdate)->age;
                })
                ->toJson();
        }
    }
    public function get(Request $request)
    {
        if ($request->ajax()) {
            $benefit = Child::find($request->id);
            return response()->json($benefit);
        }
    }
    public function add(Request $request)
    {
        if ($request->ajax()) {
            $benefit = Child::create([
                'name' => $request->name,
                'active' => $request->active != null ? true : false,
            ]);
            return response()->json($benefit);
        }
    }
    public function save(Request $request)
    {
        if ($request->ajax()) {
            $benefit = Child::find($request->id);
            $benefit->name = $request->name;
            $benefit->active =  $request->active != null ? true : false;
            $benefit->save();
            return response()->json($benefit);
        }
    }
    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $benefit = Child::find($request->id);
            if ($benefit != null) {
                $benefit->delete();
            }
            return response()->json($benefit);
        }
    }

    public function get_by_id(Request $request)
    {
        $child = Child::where(['id' => 1])->with('child_gender')->first();
        return response()->json($child);
    }

    public function info($id)
    {
        // return response()->json($id);
        $child = Child::find($id);
        $child->age = Carbon::parse($child->birthdate)->age;
        return view('benefits_plan.index', [ 'child' => $child]);

    }
}
