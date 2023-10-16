<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class IndexApplicationController extends BaseApplicationController
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getApplicationById(Request $request)
    {
        $application = $this->applicationService->findApplicationById($request->id);
        if ($application) {
            return response()->json(['ans' => $application], 200);
        }
        return response()->json(['ans' => 'Заявка не найдена'], 404);
    }

    public function main()
    {
        $applications = Application::orderBy('id')->paginate(10);
        return view('welcome', compact('applications'));
    }

    public function check()
    {
        dd(123);
    }
}
