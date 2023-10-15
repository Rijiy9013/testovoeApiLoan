<?php

namespace App\Http\Controllers;

use App\Services\ApplicationService;
use Illuminate\Routing\Controller as BaseController;

class BaseApplicationController extends BaseController
{
    public ApplicationService $applicationService;

    public function __construct(ApplicationService $service)
    {
        $this->applicationService = $service;
    }
}
