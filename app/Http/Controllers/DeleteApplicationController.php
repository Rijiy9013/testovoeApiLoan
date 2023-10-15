<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeleteApplicationController extends BaseApplicationController
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteApplication(Request $request)
    {
        if (!$request->id){
            return response()->json(['ans' => 'Не указан ID'], 422);
        }
        $result = $this->applicationService->deleteApplicationById($request->id);
        return $result ? response()->json(['message' => 'Заявка успешно удалена'], 200) : response()->json(['message' => 'Заявка не найдена'], 404);
    }
}
