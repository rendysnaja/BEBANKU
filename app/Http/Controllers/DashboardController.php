<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboardasesi()
    {
        return view('dashboard.dashboardasesi');
    }

    public function dashboardasesor()
    {
        return view('dashboard.dashboardasesor');
    }

    public function dashboardadmin()
    {
        return view('dashboard.dashboardadmin');
    }
}
