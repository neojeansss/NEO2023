<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function __construct() { }
    public function get(Request $request)
    {
        return view('admin.dashboard');
    }
}
