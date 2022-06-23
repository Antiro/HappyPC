<?php

namespace App\Http\Controllers;
use App\Models\AboutUs;
use App\Models\Application;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutUsController extends Controller
{
    public function index(){
        return view('about.abouts', [
            'abouts' => AboutUs::all(),
            'contacts' => Contact::all(),
            'allApplications'=>Application::all()->count(),
            'workApplications'=>Application::all()->where('status_id',1)->count(),
            'readyApplications'=>Application::all()->where('status_id',4)->count(),
        ]);
    }

    public function adminView()
    {
        $admin = Auth::user();
        $aboutUs = AboutUs::all();

        return view('admin.aboutUs.aboutUs', compact(
            'admin',
            'aboutUs',
        ));
    }
}
