<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Statistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index(){
        return view('contact.contacts', [
            'contacts' => Contact::all(),
            'statistics'=>Statistic::all(),
        ]);
    }
    public function adminView()
    {
        $admin = Auth::user();
        $contacts = Contact::all();

        return view('admin.contact.contacts', compact(
            'admin',
            'contacts',
        ));
    }
}
