<?php

namespace App\Http\Controllers;

use App\Models\Support_request;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() 
    {
        $totalUsers = User::count();
        $totalRequest = Support_request::count();
        $totalRequestResolve = Support_request::where('status','resolved')->count();
        return view('admin_dashboard',[
            'totalUsers' => $totalUsers,
            'totalRequest' => $totalRequest,
            'totalRequestResolve' => $totalRequestResolve
        ]);
    }
}
