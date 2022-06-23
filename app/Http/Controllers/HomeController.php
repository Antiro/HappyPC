<?php

namespace App\Http\Controllers;
use App\Models\Application;
use App\Models\Contact;
use App\Models\MyClass;
use App\Models\Review;
use App\Models\Service;
use App\Models\Sponsor;
use App\Models\Worker;
use App\Models\WorkersClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        return view('home', [

            'contacts' => Contact::all(),
            'sponsors' => Sponsor::all(),
            'workers' => Worker::get()->take(4),
            'services' => Service::get()->take(2),

            'allApplications'=>Application::all()->count(),
            'workApplications'=>Application::all()->where('status_id',1)->count(),
            'readyApplications'=>Application::all()->where('status_id',4)->count(),

            'reviews' => Review::where('status_id',2)->where('evaluation_id',1)->get()->take(6),
        ]);
    }
}
