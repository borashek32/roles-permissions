<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ValidatePermissionForm;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $search = request()->query('search');

            if ($search) {
                $permissions = Permission::where('name', 'LIKE', "%{$search}%")
                    ->get();

            } else {
                $permissions = Permission::all();
            }
            return view('dashboard.admin.permissions.index', compact('permissions', 'search'));

        } else {
            return redirect('/dashboard')
                ->with('error', 'You do not have necessary permissions');
        }
    }

    public function store(ValidatePermissionForm $request)
    {
        $permission = Permission::create([
            'name' => $request->name
        ]);
        if ($permission) {
            return redirect(route('admin.permissions.index'))
                ->with('success', 'Role created successfully.');

        } else {
            return redirect(route('admin.permissions.index'))
                ->with('error', 'Something went wrong. Please, try later.');
        }
    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
