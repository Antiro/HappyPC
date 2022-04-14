<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Contact;
use App\Models\Statistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutUsController extends Controller
{
    public function index(){
        return view('about.abouts', [
            'abouts' => AboutUs::all(),
            'statistics'=>Statistic::all(),
            'contacts' => Contact::all(),
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
