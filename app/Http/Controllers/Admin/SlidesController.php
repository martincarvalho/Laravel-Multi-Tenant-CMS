<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Slide;
use Illuminate\Http\Request;
use App\Services\FileService;
use App\Site;

use App\Http\Requests;

class SlidesController extends Controller
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
        return view('admin.slides.index', compact('site'));
    }

    /**e
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('admin.slides.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Site $site)
    {
        $slide = new Slide($request->all());
        $file = $request->image;
        if($request->hasFile('image')){
            $fileName = $this->fileService->uploadImage($file, $site->folder, 'slides');
            $slide->image = $fileName;
        };
        $site->slides()->save($slide);
        return redirect()->action('Admin\SlidesController@index', $site->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site, Slide $slide)
    {
        return view('admin.slides.show', compact('slide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site, Slide $slide)
    {
        return view('admin.slides.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site, Slide $slide)
    {
        $file = $request->image;
        $data = $request->all();
        if($request->hasFile('image')){
            $fileName = $this->fileService->uploadImage($file, $slide->site->folder, 'slides');
            $data['image'] = $fileName;
        }else{
            $data['image'] = $slide->image;
        };
        $slide->update($data);
        return redirect()->action('Admin\SlidesController@show', ['site_id' => $site->id,'id' => $slide->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site, Slide $slide)
    {
        $imgPath = base_path('../') . $slide->site->folder . '/images/slides/' . $slide->image;
        if(\File::exists($imgPath)){
            \File::delete($imgPath);
        }
        $slide->delete();
        return redirect()->action('Admin\SlidesController@index', ['site_id' => $site->id]);
    }
}
