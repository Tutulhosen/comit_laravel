<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;

class DashboardController extends Controller
{
   /**
    * show dashboard
     */
    public function showDashboard()
    {
        return View('admin.dashboard');
    }







}
