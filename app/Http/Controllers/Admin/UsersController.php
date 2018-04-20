<?php

namespace App\Http\Controllers\Admin;

use App\Site;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('checkAdmin')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = \App\User::getRoles();
        $sites = Site::pluck('title', 'id');
        return view('admin.users.create', compact('sites', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $password = bcrypt($request->password);
        $request->merge(['password' => $password]);
        $user = User::create($request->all());
        $sites = $request->sites;
        if(!empty($sites)){
            $sites = array_filter($sites);
            $user->sites()->sync($sites);
        }
        return redirect()->action('Admin\UsersController@index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = \App\User::getRoles();
        $sites = Site::pluck('title', 'id');
        return view('admin.users.edit', compact('roles', 'sites', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if(!empty($request->password)){
            $password = bcrypt($request->password);
            $request->merge(['password' => $password]);
        }else{
            $request->merge(['password' => $user->password]);
        }
        $user->update($request->all());
        $sites = $request->sites;
        if(!empty($sites)){
            $sites = array_filter($sites);
            $user->sites()->sync($sites);
        }
        return redirect('/users/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->action('Admin\UsersController@index');
    }
}
