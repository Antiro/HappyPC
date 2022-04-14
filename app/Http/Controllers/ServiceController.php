<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceStoreRequest;
use App\Models\Contact;
use App\Models\Evaluation;
use App\Models\ImagesOfService;
use App\Models\MyClass;
use App\Models\Review;
use App\Models\Service;
use App\Models\Statistic;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ServiceController extends Controller
{

    public function index()
    {
        return view('service.index', [
            'services' => Service::all(),
            'statistics' => Statistic::all(),
            'contacts' => Contact::all(),
        ]);
    }

    // переходим на форму создания
    public function create()
    {

    }

    // создаем новый
    public function store(ServiceStoreRequest $request)
    {
        if (Gate::allows('admin')) {

            $files = $request->allFiles();

            $service = Service::create([
                'name' => $request->get('name'),
                'class_id' => $request->get('class_id'),
                'description' => $request->get('description'),
                'price' => $request->get('price'),
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
                    'img' => 'services/default.jpg',
                    'service_id' => $service->id,
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

        return view('service.service', [
            'service' => $service,
            'reviews' => $service->reviews,
            'reviewsCl'=>$service->reviews->count(),
            'likes'=>Review::where('evaluation_id',1)->where('service_id',$service->id)->count(),
            'dislike'=>Review::where('evaluation_id',2)->where('service_id',$service->id)->count(),
            'statistics' => Statistic::all(),
            'contacts' => Contact::all(),
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
                'class_id' => $request->get('class_id'),
                'description' => $request->get('description'),
                'price' => $request->get('price'),
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
