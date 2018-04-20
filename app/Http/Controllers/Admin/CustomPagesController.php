<?php

namespace App\Http\Controllers\Admin;

use App\Area;
use App\CustomPage;
use App\Services\FileService;
use App\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

class CustomPagesController extends Controller
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
    public function index($site, $area)
    {
        return view('admin.customPages.index', compact('site', 'area'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($site, $area)
    {
        return view('admin.customPages.create', compact('site', 'area'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $site, $area)
    {
        $customPage = new CustomPage($request->all());
        $file = $request->image;
        if($request->hasFile('image')){
            $fileName = $this->fileService->uploadImage($file, $site->folder, 'customPages');
            $customPage->image = $fileName;
        };

        $area->customPages()->save($customPage);
        return redirect()->action('Admin\AreasController@show', [$site, $area]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site, Area $area, CustomPage $customPage)
    {
        return view('admin.customPages.show', compact('site', 'customPage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($site, $area, $customPage)
    {
        return view('admin.customPages.edit', compact('site', 'area', 'customPage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $site, $area,$customPage)
    {
        $file = $request->image;
        $data = $request->all();
        if($request->hasFile('image')){
            $fileName = $this->fileService->uploadImage($file, $site->folder, 'customPages');
            $data['image'] = $fileName;
        }else{
            $data['image'] = $customPage->image;
        };
        $customPage->update($data);
        return redirect()->action('Admin\AreasController@show', [$site, $area]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($site, $area, $customPage)
    {
        $imgPath = base_path('../') . $customPage->area->site->folder . '/images/customPages/' . $customPage->image;
        if(\File::exists($imgPath)){
            \File::delete($imgPath);
        }
        $customPage->delete();
        return redirect()->action('Admin\AreasController@show', [$site, $area]);
    }
}
