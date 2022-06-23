<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    public function index(){
        return view('delivery.delivery', [
            'contacts' => Contact::all(),
            'delivery'=>Delivery::all(),
        ]);
    }

    public function adminView()
    {
        $admin = Auth::user();
        $delivery = Delivery::all();

        return view('admin.delivery.delivery', compact(
            'delivery',
            'admin',
        ));
    }
}
