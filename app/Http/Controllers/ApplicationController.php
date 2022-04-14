<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Http\Requests\ApplicationStoreRequest;
use App\Models\Application;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ApplicationController extends Controller
{
    public function registerApplication (ApplicationRequest $request)
    {

        $application = Application::create([
                'user_id' => $request->user,
                'service_id'=> $request->service,
                'status_id'=>1,
                'comment'=>$request->comment,
            ]
        );

        if ($application) {
            return redirect()->route("services.show",$request->service)
                ->with('success', 'Заявка отправленна');
        }

        return back()->withErrors([
            'error' => 'что-то пошло не так...'
        ]);
    }
    public function adminView()
    {
        $admin = Auth::user();
        $applications = Application::all();

        return view('admin.application.applications', compact(
            'admin',
            'applications',
        ));
    }

    public function edit(Application $application)
    {
        if (Gate::allows('admin')) {
            return view('admin.application.edit', ['application' => $application, 'statuses' => Status::all(), 'admin' => Auth::user()]);
        }

        return redirect()->route('admin.servicesAdminView')
            ->with('errors', 'Возникла ошибка');
    }

    // сохраняем внесенные изменения
    public function update(ApplicationStoreRequest $request, Application $application)
    {
        if (Gate::allows('admin')) {

            $application->update([
                'status_id' => $request->get('status_id'),
                'comment' => $request->get('comment'),
            ]);

            return redirect()->route('applications.edit', $application)
                ->with('success', 'Данные успешно изменены');
        }
        return redirect()->route('admin.ApplicationsAdminView')
            ->with('errors', 'Возникла ошибка');
    }

    // удаляем выбранный пост
    public function destroy(Application $application)
    {
        if (Gate::allows('admin')) {
            $application->delete();

            return redirect()->route('admin.ApplicationsAdminView')
                ->with('success', 'Данные успешно удалены');
        }

        return redirect()->route('admin.ApplicationsAdminView')
            ->with('errors', 'Возникла ошибка');
    }
}
