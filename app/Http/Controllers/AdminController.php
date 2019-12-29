<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function main()
    {
        return view('admin.main');
    }

    public function roles()
    {
        $users = User::All();
        return view('admin.roles', compact('users'));
    }
    public function editRoles($id)
    {
        $user = User::find($id);
        $roles = Role::All();
        return view('admin.editRoles', compact('user', 'roles'));
    }

    public function createRole(Request $request, $id)
    {
        User::find($request->userId)->roles()->attach($id);
        return redirect()->route('admin.roles.edit', $request->userId);
    }
    public function deleteRole(Request $request, $id)
    {

        User::find($request->userId)->roles()->detach($id);
        return redirect()->route('admin.roles.edit', $request->userId);
    }
    public function destroyUser($id)
    {

        User::find($id)->delete();
        return back();
    }
    //MAL
    public function updateRoles(Request $request, $id)
    {
        // $roles = User::find($id)->roles->where('pivot.user_id',$id)->delete();
        $roles = User::find($id)->roles()->delete();

        return User::find($id);
        //$roles->detach();
        //Prueba para verificar el funcionamiento de los checkbox
        /*
        $response = $request->admin ? true : false;
        $response2 = $request->editor ? true : false;

        return "UserId: " . $id . "|Admin: " . (string) $response . "|Editor: " . (string) $response2;
        */
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {/*
        $users = User::All();
        return view('admin.index', compact('users'));*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
