<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use App\Models\Child;
use App\Models\SolidarityGroup;
use Illuminate\Http\Request;

class BenefitPlanController extends Controller
{
    //
    public function add(Request $request)
    {
        if (!$request->id) {
            abort(403);
        }
        $child = Child::find($request->id);
        if (!$child) abort(403);
        $solidarity_groups = SolidarityGroup::where(['subproject_id' => $child->subproject_id])->get();
        $benefits = Benefit::orderBy('name', 'asc')->get();
        // return $request->id;
        return view(
            'benefits_plan.add',
            [
                'child' => $child,
                'solidarity_groups' => $solidarity_groups,
                'benefits' => $benefits,
            ]
        );
    }
}
