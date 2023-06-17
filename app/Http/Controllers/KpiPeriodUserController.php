<?php

namespace App\Http\Controllers;

use App\Http\Requests\KpiPeriodRequest;
use App\Models\Kpi;
use App\Models\KpiPeriodUser;
use App\Models\PeriodUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KpiPeriodUserController extends Controller
{
    //
    public function add(KpiPeriodRequest $request)
    {
        $user = Auth::user();
        // return response()->json($user);
        $period_user = PeriodUser::where([ 'user_id' => $user->id, 'period_id' => $request->period_id])->first();
        if ($period_user == null) {
            $period_user = PeriodUser::create([
                'user_id' => $user->id,
                'period_id' => $request->period_id,
                'active' => 1,
            ]);
        }
        $kpis = [
            Kpi::where(['field_name' => 'credit_card'])->first(),
            Kpi::where(['field_name' => 'credit_car'])->first(),
            Kpi::where(['field_name' => 'payroll_credit'])->first(),
            Kpi::where(['field_name' => 'personal_credit'])->first(),
        ];

        foreach ($kpis as $key => $kpi) {
            KpiPeriodUser::create([
                'period_user_id' => $period_user->id,
                'kpi_id' => $kpi->id,
                'active' => 1,
                'value' => $request[$kpi->field_name]
            ]);
        }

        // $credit_card = Kpi::where(['field_name' => 'credit_card'])->first();
        // $credit_car = Kpi::where(['field_name' => 'credit_car'])->first();
        // $payroll_credit = Kpi::where(['field_name' => 'payroll_credit'])->first();
        // $personal_credit = Kpi::where(['field_name' => 'personal_credit'])->first();

        return response()->json(['success' => true]);
    }
}
