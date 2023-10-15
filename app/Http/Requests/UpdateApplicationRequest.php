<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [];

        if ($this->has('loan_amount')) {
            $rules['loan_amount'] = ['numeric', 'between:0,5000000'];
        }

        if ($this->has('loan_term')) {
            $rules['loan_term'] = ['integer', 'between:0,6'];
        }

        if ($this->has('interest_rate')) {
            $rules['interest_rate'] = ['numeric', 'between:0,14'];
        }

        if ($this->has('application_status_id')) {
            $rules['application_status_id'] = ['exists:application_statuses,id'];
        }

        if ($this->has('dealer_id')) {
            $rules['dealer_id'] = ['exists:dealers,id'];
        }

        if ($this->has('dealer_employee_id')) {
            $rules['dealer_employee_id'] = [
                'exists:dealer_employees,id',
                Rule::exists('dealer_employees', 'id')->where(function ($query) {
                    $query->where('dealer_id', $this->input('dealer_id'));
                }),
            ];
        }

        if ($this->has('bank_id')) {
            $rules['bank_id'] = ['exists:banks,id'];
        }

        return $rules;
    }

}
