<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (Auth::user()->hasRole('user')) {
            return view('dashboard.user.index');

        } else {
            return redirect('/dashboard')
                ->with('error', 'You do not have necessary permissions');
        }
    }
}
