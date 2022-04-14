<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\MyClass;
use App\Models\Review;
use App\Models\Service;
use App\Models\Sponsor;
use App\Models\Statistic;
use App\Models\Worker;
use App\Models\WorkersClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        return view('home', [
            'services' => Service::get()->take(2),
            'reviews' => Review::where('evaluation_id',1)->get()->take(6),
            'workers' => Worker::get()->take(4),
            'sponsors' => Sponsor::all(),
            'statistics'=>Statistic::all(),
            'contacts' => Contact::all(),
        ]);
    }
}
