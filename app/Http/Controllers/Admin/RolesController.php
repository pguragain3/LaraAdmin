<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateRoleRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\UtilityFunctions;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::with('permissions')->get();
        return view('admin.roles.index', ['role' => $role]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoleRequest $request)
    {
        // dd($request);
        $role = new Role;
        $role->name = $convertedString=str_replace(' ', '-', $request['name']);
        if ($role->save()) {
            $role->permissions()->sync($request['permissions']);
            History::create([
                'description' => 'Created role ' . $convertedString,
                'user_id' => Auth::user()->id,
                'type'=>1,
                'ip_address'=>UtilityFunctions::getUserIP(),
            ]);
            return Redirect::back()->with('successMessage','Success!! Role created');
        } else {
            return Redirect::back()->with('errorMessage','Error!! Role not created');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
