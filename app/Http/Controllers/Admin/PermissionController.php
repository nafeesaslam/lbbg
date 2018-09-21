<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NamedRole;
use App\Role;
use DB;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = NamedRole::get();
        return view('admin.permissions.index',['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('admin.permissions.create',['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $namedrole = new NamedRole;

      
        $namedrole->name = $request->name;
        $namedrole->save();
        // Prevent user from self deactivating
        // if ($user->id == Auth::user()->id) {
        //     return back()->with('custom_errors', 'You can not change your roles. Ask super admin to do that.');
        // }

        // // Prevent user from updating a super admin
        // if ($user->hasRole('super_admin')) {
        //     // if logged in user dont have Super Admin Role stop him
        //     if (!Auth::user()->hasRole('super_admin')) {
        //         return back()->with('custom_errors', 'User can not be updated. You need super admin role.');
        //     }
        // }

        // Update Roles
        $namedrole->roles()->sync($request->roles);
        return 'done!';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return $id;
        $role = NamedRole::findOrFail($id);
        $permissions = Role::get();
        //$maps = DB::table('map_roles')->where('name_roles_id', '=',$id)->get();


        //return $maps;
        return view('admin.permissions.edit', ['role' => $role, 'permissions' => $permissions]);
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
        $namedrole = NamedRole::findOrFail($id);

      
        $namedrole->name = $request->name;
        $namedrole->save();
        // Prevent user from self deactivating
        // if ($user->id == Auth::user()->id) {
        //     return back()->with('custom_errors', 'You can not change your roles. Ask super admin to do that.');
        // }

        // // Prevent user from updating a super admin
        // if ($user->hasRole('super_admin')) {
        //     // if logged in user dont have Super Admin Role stop him
        //     if (!Auth::user()->hasRole('super_admin')) {
        //         return back()->with('custom_errors', 'User can not be updated. You need super admin role.');
        //     }
        // }

        // Update Roles
        $namedrole->roles()->sync($request->roles);
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
