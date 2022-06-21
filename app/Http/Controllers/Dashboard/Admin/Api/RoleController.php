<?php

namespace App\Http\Controllers\Dashboard\Admin\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateRoleForm;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function roles()
    {
        return view('dashboard.admin.roles.index');
    }

    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $search = request()->query('search');

            if ($search) {
                $roles = Role::where('name', 'LIKE', "%{$search}%")
                    ->latest()
                    ->paginate(10);

            } else {
                $roles = Role::latest()->paginate(10);
            }
            return response()->json([
                'status'  => 200,
                'search'  => $search,
                'roles'   => $roles
            ]);

        } else {
            return response()->json([
                'status' => 403,
                'error'  => 'You do not have the necessary permissions'
            ]);
        }
    }

    public function store(ValidateRoleForm $request)
    {
      if (Auth::user()->hasRole('admin')) {
        $role = Role::create([
            'name' => $request->name
        ]);
        if ($role) {
            return response()->json([
              'status'   => 200,
              'message'  => 'Role created successfully.'
            ]);

        } else {
            return response()->json([
              'status'   => 404,
              'message'  => 'Something went wrong. Please, try later.'
            ]);
        }

      } else {
        return response()->json([
            'status' => 403,
            'error'  => 'You do not have the necessary permissions'
        ]);
    }
    }

    public function edit(Role $role)
    {
        if($role) {
            return response()->json([
                'status'   => 200,
                'role'     => $role
            ]);
        } else {
            return redirect(route('admin.roles.index'))
                ->with('error', 'Something went wrong. Please, try later.');
        }
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
        $role = Role::find($id);

        if ($role) {
          $role->delete();

          return response()->json([
            'status'   => 200,
            'message'  => 'Role deleted successfully'
          ]);

        } else {
          return response()->json([
            'status'    => 404,
            'message'   => "Role can't be found. Please, try later."
          ]);
        }
    }
}
