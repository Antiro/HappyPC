<?php

namespace App\Http\Controllers;
use App\Http\Requests\ServiceStoreRequest;
use App\Models\Application;
use App\Models\Contact;
use App\Models\Evaluation;
use App\Models\ImagesOfService;
use App\Models\MyClass;
use App\Models\Review;
use App\Models\Service;
use App\Models\ServiceApplications;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ServiceApplicationsController extends Controller
{
    public function update(Request $request, ServiceApplications $serviceApplication)
    {

        if (Gate::allows('admin')) {
            $serviceApplication->update([
                'worker_id' => $request->get('worker_id'),

            ]);

            return redirect()->route('applications.edit', $serviceApplication->application_id)
                ->with('success', 'Данные успешно изменены');
        }
        return redirect()->route('admin.servicesAdminView')
            ->with('errors', 'Возникла ошибка');
    }

}
