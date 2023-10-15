<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateApplicationRequest;

class UpdateApplicationController extends BaseApplicationController
{
    /**
     * @param UpdateApplicationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateApplication(UpdateApplicationRequest $request)
    {

        if (!$request->id) {
            return response()->json(['message' => 'Не указан ID'], 404);
        }

        $application = $this->applicationService->findApplicationById($request->id);
        if (!$application) {
            return response()->json(['message' => 'Такой заявки не найдено'], 404);
        }
        $data = [];
        if ($request->filled('dealer_id')) {
            $data['dealer_id'] = $request->dealer_id;
        }

        if ($request->filled('bank_id')) {
            $data['bank_id'] = $request->bank_id;
        }

        if ($request->filled('dealer_employee_id')) {
            $data['dealer_employee_id'] = $request->dealer_employee_id;
        }
        if ($request->filled('application_status_id')) {
            $data['application_status_id'] = $request->application_status_id;
        }
        if ($request->filled('loan_term')) {
            $data['loan_term'] = $request->loan_term;
        }
        if ($request->filled('loan_amount')) {
            $data['loan_amount'] = $request->loan_amount;
        }
        if ($request->filled('interest_rate')) {
            $data['interest_rate'] = $request->interest_rate;
        }
        if ($request->filled('reason_description')) {
            $data['reason_description'] = $request->reason_description;
        }
        $answer = $this->applicationService->updateApplicationById($request->id, $data);
        if ($answer['status']) {
            return response()->json($answer['application'], 200);
        }
        return response()->json(['ans' => 'Changed failed'], 400);

    }
}
