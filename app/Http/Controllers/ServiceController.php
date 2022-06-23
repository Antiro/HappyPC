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
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::all();
        if (isset($request->class)) {
            $services= $services->where('class_id', $request->class);
        }

        return view('services.index', [

            'services' => $services,
            'classes' => MyClass::all(),
            'contacts' => Contact::all(),
            'allApplications'=>Application::all()->count(),
            'workApplications'=>Application::all()->where('status_id',1)->count(),
            'readyApplications'=>Application::all()->where('status_id',4)->count(),

        ]);
    }

    public function getServicesByCategoryForm(Request $request)
    {
        $products = Service::allReal();

        if (isset($request->class)) {
            $products = $products->where('class_id', $request->class);
        }

        if (isset($request->order)) {
            $products->orderBy($request->order, $request->course);
        }
        return back()->withInput($request->all() + ['services' => $products->get()]);
    }

    // создаем новый
    public function store(ServiceStoreRequest $request)
    {
        if (Gate::allows('admin')) {

            $files = $request->allFiles();

            $service = Service::create([

                'name' => $request->get('name'),
                'price' => $request->get('price'),
                'class_id' => $request->get('class_id'),
                'description' => $request->get('description'),

            ]);

            if ($request->hasFile('images')) {
                $files = $files['images'];

                foreach ($files as $file) {

                    $path = FileService::uploadImgService($file);

                    ImagesOfService::create([

                        'img' => $path,
                        'service_id' => $service->id,

                    ]);
                }
            } else {
                ImagesOfService::create([

                    'service_id' => $service->id,
                    'img' => 'services/default.jpg',

                ]);
            }

            return redirect()->route('admin.servicesAdminView')
                ->with('success', 'Данные успешно сохранены');
        }
        return redirect()->route('admin.servicesAdminView')
            ->with('errors', 'Возникла ошибка');
    }

    // просматриваем выбранный
    public function show(Service $service)
    {
        return view('services.service', [

            'service' => $service,
            'contacts' => Contact::all(),
            'allApplications'=>Application::all()->count(),
            'reviewsCl'=>Review::where('service_id',$service->id)->where('status_id',2)->count(),
            'workApplications'=>Application::all()->where('status_id',1)->count(),
            'reviews' => Review::where('status_id',2)->where('service_id',$service->id)->get(),
            'readyApplications'=>Application::all()->where('status_id',4)->count(),
            'likes'=>Review::where('evaluation_id',1)->where('service_id',$service->id)->where('status_id',2)->count(),
            'dislike'=>Review::where('evaluation_id',2)->where('service_id',$service->id)->where('status_id',2)->count(),

        ]);
    }

    public function adminView()
    {
        $admin = Auth::user();
        $services = Service::all();
        $myClasses = MyClass::all();

        return view('admin.service.services', compact(
            'admin',
            'services',
            'myClasses',
        ));
    }

    // переходим на форму редактирования
    public function edit(Service $service)
    {
        if (Gate::allows('admin')) {
            return view('admin.service.edit', ['service' => $service, 'myClasses' => MyClass::all(), 'admin' => Auth::user()]);
        }

        return redirect()->route('admin.servicesAdminView')
            ->with('errors', 'Возникла ошибка');
    }

    // сохраняем внесенные изменения
    public function update(ServiceStoreRequest $request, Service $service)
    {
        if (Gate::allows('admin')) {

            $files = $request->allFiles();

            $service->update([

                'name' => $request->get('name'),
                'price' => $request->get('price'),
                'class_id' => $request->get('class_id'),
                'description' => $request->get('description'),

            ]);

            if ($request->hasFile('images')) {
                $files = $files['images'];

                foreach ($files as $file) {

                    $path = FileService::uploadImgService($file);

                    ImagesOfService::create([

                        'img' => $path,
                        'service_id' => $service->id,

                    ]);
                }
            }

            return redirect()->route('services.edit', $service)
                ->with('success', 'Данные успешно изменены');
        }
        return redirect()->route('admin.servicesAdminView')
            ->with('errors', 'Возникла ошибка');
    }

    // удаляем выбранный пост
    public function destroy(Service $service)
    {
        if (Gate::allows('admin')) {
            $service->delete();

            return redirect()->route('admin.servicesAdminView')
                ->with('success', 'Данные успешно удалены');
        }

        return redirect()->route('admin.servicesAdminView')
            ->with('errors', 'Возникла ошибка');
    }
}
