<?php

namespace App\Http\Controllers\Admin;

use App\Site;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Http\Requests;

class SitesController extends Controller
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
        $sites = Site::all();
        return view('admin.sites.index', compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name', 'id');
        return view('admin.sites.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $site = Site::create($request->all());
        $users = array_filter($request->input('users'));
        if(!empty($users)){
            $site->users()->sync($users);
        }
        return redirect()->action('Admin\SitesController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        return view('admin.sites.show', compact('site'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        $users = User::pluck('name', 'id');
        return view('admin.sites.edit', compact('site', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site)
    {
        $site->update($request->all());
        $users = array_filter($request->input('users'));
        if(!empty($users)){
            $site->users()->sync($users);
        }
        return redirect()->action('Admin\SitesController@show', ['site_id' => $site->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        $site->delete();
        return redirect()->action('Admin\SitesController@index');
    }
}
