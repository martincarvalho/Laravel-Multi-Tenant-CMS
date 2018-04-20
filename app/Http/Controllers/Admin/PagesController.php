<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use App\Services\FileService;
use App\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

class PagesController extends Controller
{

    private $fileService;

    public function __construct()
    {
        $this->fileService = new FileService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Site $site)
    {
        return view('admin.pages.index', compact('site'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('admin.pages.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Site $site)
    {
        $page = new Page($request->all());
        $file = $request->image;
        if($request->hasFile('image')){
            $fileName = $this->fileService->uploadImage($file, $site->folder, 'pages');
            $page->image = $fileName;
        };

        $site->pages()->save($page);
        return redirect()->action('Admin\PagesController@index', $site->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site, Page $page)
    {
        return view('admin.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site, Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site, Page $page)
    {
        $file = $request->image;
        $data = $request->all();
        if($request->hasFile('image')){
            $fileName = $this->fileService->uploadImage($file, $page->site->folder, 'pages');
            $data['image'] = $fileName;
        }else{
            $data['image'] = $page->image;
        };
        $page->update($data);
        return redirect()->action('Admin\PagesController@show', ['site_id' => $site->id, 'id' => $page->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site, Page $page)
    {
        $imgPath = base_path('../') . $page->site->folder . '/images/pages/' . $page->image;
        if(\File::exists($imgPath)){
            \File::delete($imgPath);
        }
        $page->delete();
        return redirect()->action('Admin\PagesController@index', ['site_id' => $site->id]);
    }
}
