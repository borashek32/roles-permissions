<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (Auth::user()->hasRole('admin')) {
            return view('dashboard.admin.index');

        } else {
            return redirect('/dashboard')
                ->with('error', 'You do not have necessary permissions');
        }
    }
}
