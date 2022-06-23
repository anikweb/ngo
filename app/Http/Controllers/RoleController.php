<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->can('role management')){
            return view('backend.pages.role.index',[
                'roles' =>Role::orderBy('name','asc')->paginate(10),
            ]);
        }else{
            return abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->can('role management')){
            // Permission::create(['name' => 'project management']);
            // Permission::create(['name' => 'slider management']);
            // Permission::create(['name' => 'volunteers management']);
            // Permission::create(['name' => 'media management']);
            // return 'added permissions';
            return view('backend.pages.role.create',[
                'permissions' =>Permission::orderBy('name','asc')->get(),
            ]);
        }
        else{
            return abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->can('role management')){

            $request->validate([
                "role_name" => "required",
            ],[
                "role_name.required" => "Please Enter Role Name",
            ]);
            $role = Role::create(['name' => $request->role_name ]);
            $role->givePermissionTo($request->permission_name);
            return redirect()->route('role.index')->with('success','New Role Created.');

        }
        else{
            return abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(auth()->user()->can('role management')){

            return view('backend.pages.role.show',[
                'role'=>Role::findOrFail($id),
            ]);

        }else{
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->can('role management')){
            // return $id;

            return view('backend.pages.role.edit',[
                'role' => Role::findOrFail($id),
                'permissions' => Permission::all(),
            ]);
        }
        else{
            return abort(404);
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
        if(auth()->user()->can('role management')){
            // return $request;
            // return $id;
            $role = Role::findorFail($id);
            $role->syncPermissions($request->permission_name);
            return back();
            // $permission->syncRoles($roles);
        }
        else{
            return abort(404);
        }

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
    public function roleAssignUsers(){
        if(auth()->user()->can('role management')){
            return view('backend.pages.role.assign_user',[
                'users' => User::orderBy('name','asc')->paginate(10),
                'roles' =>Role::orderBy('name','asc')->get(),
            ]);
        }
        else{
            return abort(404);
        }
    }
    public function roleAssignUsersPost(Request $request){
        if(auth()->user()->can('role management')){
            // return $request;
            $request->validate([
                "*" => "required",
            ],[
                "user_id.required" => "Please Select User.",
                "role_name.required" => "Please Select User.",
            ]);

            $user = User::findOrFail($request->user_id);
            $user->syncRoles($request->role_name);
            return back()->with('success',$user->name.' Assigned as a '.$request->role_name);
        }
        else{
            return abort(404);
        }
    }
}
