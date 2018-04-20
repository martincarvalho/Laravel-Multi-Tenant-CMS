<?php

namespace App\Http\Controllers\Admin;

use App\Area;
use App\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Site $site)
    {
        return view('admin.areas.index', compact('site'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('admin.areas.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Site $site)
    {
        $area = new Area($request->all());
        $site->areas()->save($area);
        return redirect()->action('Admin\AreasController@index', $site->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site, Area $area)
    {
        return view('admin.areas.show', compact('area', 'site'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site, Area $area)
    {
        return view('admin.areas.edit', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site, Area $area)
    {
        $area->update($request->all());
        return redirect()->action('Admin\AreasController@index', $site->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site, Area $area)
    {
        $area->delete();
        return redirect()->action('Admin\AreasController@index', $site->id);
    }
}
