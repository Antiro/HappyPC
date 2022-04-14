<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Statistic;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WorkerController extends Controller
{

    public function index()
    {
        return view('worker.index', [
            'workers' => Worker::all(),
            'statistics'=>Statistic::all(),
            'contacts' => Contact::all(),
        ]);
    }

    public function show(Worker $team)
    {
        return view('worker.worker', [
            'worker' => $team,
            'statistics'=>Statistic::all(),
            'contacts' => Contact::all(),
        ]);
    }

    public function adminView()
    {
        $admin = Auth::user();
        $workers = Worker::all();

        return view('admin.worker.workers', compact(
            'admin',
            'workers',
        ));
    }
}
