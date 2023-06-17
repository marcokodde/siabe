<?php

namespace App\Http\Controllers;

use App\Models\Kpi;
use App\Models\KpiPeriodUser;
use App\Models\Period;
use App\Models\PeriodUser;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PeriodController extends Controller
{
    public function index(Request $request)
    {
        return view('periods.index');
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
    // public function list(Request $request)
    // {
    //     $user = Auth::user();
    //     $data = Period::latest()->get();
    //     foreach ($data as $key => $d) {
    //         # code...
    //         $period_user = PeriodUser::where(['user_id' => $user->id, 'period_id' => $d->id])->first();
    //         if ($period_user == null) {
    //             $d['period_user_id'] = null;
    //         } else {
    //             $d['period_user_id'] = $period_user->id;
    //         }
    //     }
    //     return DataTables::of($data)
    //         ->addIndexColumn()
    //         ->make(true);
    //     if ($request->ajax()) {
    //     }
    // }
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
                'type' => $request->type,
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
            $period->type = $request->type;
            $period->active =  $request->active != null ? true : false;
            $period->save();
            return response()->json($period);
        }
    }
    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $period = Period::find($request->id);
            if ($period != null) {
                $period->delete();
            }
            return response()->json($period);
        }
    }

    public function paginated(Request $request)
    {
        $user = Auth::user();
        $paginated = Period::orderBy('date', 'desc')->paginate(7);
        $periods = $paginated->items();
        $kpi = Kpi::where(['field_name' => $request->kpi])->first();
        $data = [];
        $periods_name = [];
        $kpi_user = [];
        $kpi_avg = [];
        foreach ($periods as $key => $period) {
            $periods_name[] = $this->DateMonth($period->date);
            $period_users = PeriodUser::where(['period_id' => $period->id])->get();
            $user_values = DB::table('kpis_periods')
                ->join('period_users', 'kpis_periods.period_user_id', '=', 'period_users.id')
                ->join('periods', 'period_users.period_id', '=', 'periods.id')
                ->where(['periods.id' => $period->id, 'kpis_periods.kpi_id' => $kpi->id, 'period_users.user_id' => $user->id])
                ->select('kpis_periods.*')
                ->avg('value')
                // ->get()
            ;
            $kpi_user[] = $user_values;
            if ($user_values != null) {
                $all_values = DB::table('kpis_periods')
                    ->join('period_users', 'kpis_periods.period_user_id', '=', 'period_users.id')
                    ->join('periods', 'period_users.period_id', '=', 'periods.id')
                    ->where(['periods.id' => $period->id, 'kpis_periods.kpi_id' => $kpi->id])
                    ->select('kpis_periods.*')
                    ->avg('value')
                    // ->get()
                ;
                $kpi_avg[] = $all_values;
            } else
                $kpi_avg[] = null;
        }
        $data = [
            'periods' => $periods_name,
            'avg' => $kpi_avg,
            'user' => $kpi_user,
        ];

        return response()->json($data);
    }
    private function DateMonth($date)
    {
        return (new \Carbon\Carbon($date, new DateTimeZone('America/Mexico_City')))->format('m/y');
    }
    
}
