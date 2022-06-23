<?php

namespace App\Http\Controllers;
use App\Models\Application;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index(){
        return view('contact.contacts', [
            'contacts' => Contact::all(),
            'allApplications'=>Application::all()->count(),
            'workApplications'=>Application::all()->where('status_id',1)->count(),
            'readyApplications'=>Application::all()->where('status_id',4)->count(),
        ]);
    }
}
