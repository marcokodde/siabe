<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index(Request $request)
    {
        // cartera-total-credito
        $user = Auth::user();
        $period = Period::where(['active' => true])->orderBy('date', 'desc')->first();

        $cartera_total_credito = DB::table('kpi_period_users')
            ->join('period_users', 'kpi_period_users.period_user_id', '=', 'period_users.id')
            ->join('kpis', 'kpi_period_users.kpi_id', '=', 'kpis.id')
            ->where(['period_users.period_id' => $period->id, 'kpis.field_name' => 'cartera-total-credito'])
            ->select('kpi_period_users.value')
            ->first();
        $imor = DB::table('kpi_period_users')
            ->join('period_users', 'kpi_period_users.period_user_id', '=', 'period_users.id')
            ->join('kpis', 'kpi_period_users.kpi_id', '=', 'kpis.id')
            ->where(['period_users.period_id' => $period->id, 'kpis.field_name' => 'imor'])
            ->select('kpi_period_users.value')
            ->first();
        $total_users = DB::table('users')
            ->count();
        $total_kpis = DB::table('kpis')
            ->count();
        $total_values = DB::table('kpi_period_users')
            ->count();
        $last_kpi_send = DB::table('kpi_period_users')
            ->join('kpis', 'kpi_period_users.kpi_id', '=', 'kpis.id')
            ->join('category_kpis', 'kpis.category_kpi_id', '=', 'category_kpis.id')
            ->join('period_users', 'kpi_period_users.period_user_id', '=', 'period_users.id')
            ->where(['category_kpis.type' => 1, 'period_users.user_id' => $user->id])
            ->select('kpis.id as kpi_id', 'category_kpis.id as category_kpi_id', 'category_kpis.field_name as category_field_name' ,'kpis.name as kpi_name', 'kpis.field_name as kpi_field_name')
            ->orderBy('kpi_period_users.id', 'desc')
            ->first();
        $last_kpi_ther = DB::table('kpi_period_users')
            ->join('kpis', 'kpi_period_users.kpi_id', '=', 'kpis.id')
            ->join('category_kpis', 'kpis.category_kpi_id', '=', 'category_kpis.id')
            ->join('period_users', 'kpi_period_users.period_user_id', '=', 'period_users.id')
            ->where(['category_kpis.type' => 2])
            ->select('kpis.id as kpi_id', 'category_kpis.id as category_kpi_id', 'category_kpis.field_name as category_field_name' ,'kpis.name as kpi_name', 'kpis.field_name as kpi_field_name')
            ->orderBy('kpi_period_users.id', 'desc')
            ->first();
        $data = [
            'cartera_total_credito' => $cartera_total_credito,
            'imor' => $imor,
            'total_users' => $total_users,
            'total_kpis' => $total_kpis,
            'total_values' => $total_values,
            'last_kpi_send' => $last_kpi_send,
            'last_kpi_ther' => $last_kpi_ther,
            // 'kpis' => [
            // ]
        ];
        return view('dashboard', $data);
    }
}
