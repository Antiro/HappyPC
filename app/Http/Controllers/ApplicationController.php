<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Http\Requests\ApplicationStoreRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\Application;
use App\Models\Basket;
use App\Models\Contact;
use App\Models\ImagesOfUser;
use App\Models\Review;
use App\Models\Service;
use App\Models\Status;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ApplicationController extends Controller
{
    public function registerApplication(ApplicationRequest $request)
    {

        $application = Application::create([
                'status_id' => 1,
                'user_id' => $request->user,
                'comment' => $request->comment,
                'service_id' => $request->service,
            ]
        );

        if ($application) {
            return redirect()->route("services.show", $request->service)
                ->with('success', 'Заявка отправленна');
        }

        return back()->withErrors([
            'error' => 'что-то пошло не так...'
        ]);
    }

    public function edit(Application $application)
    {
        if (Gate::allows('admin')) {
            return view('admin.application.edit', [
                'application' => $application,
                'statuses' => Status::all(),
                'admin' => Auth::user(),
                'workers'=>Worker::all(),
            ]);
        }

        return redirect()->route('admin.servicesAdminView')
            ->with('errors', 'Возникла ошибка');
    }

    public function update(ApplicationStoreRequest $request, Application $application)
    {
        if (Gate::allows('admin')) {

            $application->update([
                'status_id' => $request->get('status_id'),
                'comment' => $request->get('comment'),
            ]);

            if ($application->status_id == 4) {
                $reviews = Review::all()->where('application_id', $application->id)->count();
                if ($reviews == 0) {
                    foreach ($application->serviceApplications as $serviceApplication) {
                        Review::create([
                                'text' => '',
                                'status_id' => 1,
                                'application_id'=>$application->id,
                                'user_id' => $application->user->id,
                                'service_id' => $serviceApplication->service->id,
                            ]
                        );
                    }
                }

            }

            return redirect()->route('applications.edit', $application)
                ->with('success', 'Данные успешно изменены');
        }
        return redirect()->route('admin.ApplicationsAdminView')
            ->with('errors', 'Возникла ошибка');
    }

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

    public function NewDestroy(Application $application)
    {
        $application->delete();
        return redirect()->route('profileApplications');
    }

    public function show(Application $application)
    {
        return view('auth.application', ['application' => $application]);
    }

    public function createApplication(PasswordRequest $request)
    {
        $basket = Basket::userBasketAllServices()->get();
        if (count($basket) > 0) {

            $order = auth()->user()->application()->create();
            $order->serviceApplications()->createMany($basket->toArray());

            $order->update([
                'comment' => $request->get('comment'),
            ]);

            Basket::userBasketAllServices()->delete();
            return to_route('profileApplications');
        }
        return back();
    }

    public function adminView(Request $request)
    {
        $applications = Application::allReal();

        if (isset($request->status)) {

            $applications= $applications->where('status_id', $request->status);
        }

        return view('admin.application.applications', [

            'admin' => Auth::user(),
            'applications' => $applications->get(),
            'status'=>$request->status,
            'statuses' => Status::all(),

        ]);
    }
}
