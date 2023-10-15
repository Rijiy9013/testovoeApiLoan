<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CreateApplicationController extends BaseApplicationController
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createApplication(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'bank_id' => [
                'required',
                Rule::exists('banks', 'id'),
            ],
            'dealer_id' => [
                'required',
                Rule::exists('dealers', 'id'),
            ],
            'dealer_employee_id' => [
                'required',
                Rule::exists('dealer_employees', 'id')->where(function ($query) use ($request) {
                    $query->where('dealer_id', $request->input('dealer_id'));
                }), // проверяем, чтобы у сотрудника был такой же dealer_id равнялся тому, что приходит
            ],
            'loan_amount' => [
                'required',
            ],
            'loan_term' => [
                'required',
            ],
            'interest_rate' => [
                'required',
            ],
            'reason_description' => [
                'required',
            ],
            'application_status_id' => [
                'required',
                Rule::exists('application_statuses', 'id'),
            ],
        ]);

        // Если валидация не прошла, возвращаем JSON с информацией об ошибках
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Ошибка валидации',
                'errors' => $validator->errors(),
            ], 422);
        }
        $data = [
            'dealer_id' => $request->dealer_id,
            'bank_id' => $request->bank_id,
            'dealer_employee_id' => $request->dealer_employee_id,
            'loan_amount' => $request->loan_amount,
            'loan_term' => $request->loan_term,
            'interest_rate' => $request->interest_rate,
            'reason_description' => $request->reason_description,
            'application_status_id' => $request->application_status_id,
        ];
        return response()->json(['ans' => $this->applicationService->createApplication($data)], 201);
    }
}
