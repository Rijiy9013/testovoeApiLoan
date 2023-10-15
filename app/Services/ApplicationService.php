<?php

namespace App\Services;

use App\Models\Application;

class ApplicationService
{
    /**
     * @param array $data
     * @return mixed
     */
    public function createApplication(array $data)
    {
        return Application::create($data);
    }

    /**
     * @param int|null $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findApplicationById(int $id = null)
    {
        return $id ? Application::where('id', $id)->first() : Application::all();
    }

    /**
     * @param int $id
     * @return bool
     */
    public function deleteApplicationById(int $id)
    {
        $application = null;
        if ($id) {
            $application = $this->findApplicationById($id);
        }

        if (!$application) {
            return false;
        }

        $application->delete();

        return true;
    }

    public function updateApplicationById(int $applicationId, array $data): array
    {
        $application = $this->findApplicationById($applicationId);
        try {
            $application->update($data);
            return ['status' => true, 'application' => $application];
        } catch (\Exception $e) {
            return ['status' => false];
        }
    }

}
