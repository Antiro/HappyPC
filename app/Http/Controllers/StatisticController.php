<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatisticController extends Controller
{
    public function adminView()
    {
        $admin = Auth::user();
        $statistics = Statistic::all();

        return view('admin.statistic.statistics', compact(
            'admin',
            'statistics',
        ));
    }
}
