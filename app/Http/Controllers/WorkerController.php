<?php

namespace App\Http\Controllers;
use App\Http\Requests\WorkerStoreRequest;
use App\Models\Application;
use App\Models\Contact;
use App\Models\ImagesOfService;
use App\Models\MyClass;
use App\Models\ServiceApplications;
use App\Models\Worker;
use App\Models\WorkersClass;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class WorkerController extends Controller
{

    public function index()
    {
        return view('worker.index', [

            'workers' => Worker::all(),
            'contacts' => Contact::all(),


            'allApplications'=>Application::all()->count(),
            'workApplications'=>Application::all()->where('status_id',1)->count(),
            'readyApplications'=>Application::all()->where('status_id',4)->count(),

        ]);
    }

    public function show(Worker $team)
    {
        return view('worker.worker', [

            'worker' => $team,
            'contacts' => Contact::all(),
            'allApplications'=>Application::all()->count(),
            'workApplications'=>Application::all()->where('status_id',1)->count(),
            'readyApplications'=>Application::all()->where('status_id',4)->count(),

        ]);
    }

    public function adminView()
    {
        $admin = Auth::user();
        $workers = Worker::all();
        $myClasses= MyClass::all();
        return view('admin.worker.workers', compact(
            'admin',
            'workers',
            'myClasses',
        ));
    }

    public function edit(Worker $worker)
    {
        if (Gate::allows('admin')) {
            return view('admin.worker.edit', [
                'worker' => $worker,
                'myClasses' => MyClass::all(),
                'admin' => Auth::user(),
                'services'=> ServiceApplications::where('worker_id','=',$worker->id)->get(),
            ]);
        }

        return redirect()->route('admin.workersAdminView')
            ->with('errors', 'Возникла ошибка');
    }

    public function store(WorkerStoreRequest $request)
    {
        if (Gate::allows('admin')) {

            $files = $request->allFiles();

            $worker= Worker::create([

                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'img'=>''

            ]);

            WorkersClass::create([
                'worker_id'=>$worker->id,
                'class_id'=>$request->get('class_id'),
            ]);

            if ($request->File('image')) {
                $files = $files['image'];
//                dd($files);
                    $path = FileService::uploadImgWorker($files);
            } else {
                $path = 'workers/default.jpg';
            }
//            dd('мимо');

            $worker->update([
                'img' => $path,
            ]);

            return redirect()->route('admin.workersAdminView')
                ->with('success', 'Данные успешно сохранены');
        }
        return redirect()->route('admin.workersAdminView')
            ->with('errors', 'Возникла ошибка');
    }

    public function update(Request $request, Worker $worker)
    {
        if (Gate::allows('admin')) {

            $files = $request->allFiles();

            $worker->update([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
            ]);

            WorkersClass::where('worker_id',$worker->id)->update([
                'class_id'=>$request->get('class_id'),
            ]);

            if ($request->File('image')) {
                $files = $files['image'];
                $path = FileService::uploadImgWorker($files);
                $worker->update([
                    'img' => $path,
                ]);
            }

            return redirect()->route('workers.edit', $worker)
                ->with('success', 'Данные успешно изменены');
        }
        return redirect()->route('workers.edit')
            ->with('errors', 'Возникла ошибка');
    }

}
