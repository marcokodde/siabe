<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KpiPeriodRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'credit_card' => 'numeric|max:100|min:0',
            'credit_car' => 'numeric|max:100|min:0',
            'payroll_credit' => 'numeric|max:100|min:0',
            'personal_credit' => 'numeric|max:100|min:0',

            'period_id' => 'required|uuid',
        ];
    }
}
