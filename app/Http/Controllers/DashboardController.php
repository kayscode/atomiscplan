<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Request;

class DashboardController extends Controller
{
    public function main_dashboard(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        // identity the current user and render the appropriate dashboard
        return view("hr-director.hr-dashboard");
    }
}
