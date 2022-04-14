<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SponsorController extends Controller
{
    public function adminView()
    {
        $admin = Auth::user();
        $sponsors = Sponsor::all();

        return view('admin.sponsor.sponsors', compact(
            'admin',
            'sponsors',
        ));
    }
}
