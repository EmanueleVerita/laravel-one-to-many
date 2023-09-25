<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//helpers
use Illuminate\Support\Facades\Auth as FacadesAuth;

class DashboardController extends Controller

{
    public function __invoke(Request $request)
    {
        
    }


    public function dashboard(){

        $user = FacadesAuth::user();
        $userId = FacadesAuth::id();

        return view('admin.dashboard');
    }
}
