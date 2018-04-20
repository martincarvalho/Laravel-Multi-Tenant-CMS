<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use App\Services\FileService;
use App\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
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
        return view('admin.posts.index', compact('site'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Site $site)
    {
        if($site->categories->count() < 1){
            Session::flash('flash_message','É preciso criar uma categoria antes de cadastrar um post.');
            return redirect()->action('Admin\CategoriesController@create', $site->id);
        }
        $categories = $site->categories->pluck('title', 'id');
        return view('admin.posts.create', compact('site', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Site $site)
    {
        $post = new Post($request->all());
        $file = $request->image;
        if($request->hasFile('image')){
            $fileName = $this->fileService->uploadImage($file, $site->folder, 'posts');
            $post->image = $fileName;
        };
        $site->posts()->save($post);
        return redirect()->action('Admin\PostsController@index', $site->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site, Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site, Post $post)
    {
        if($site->categories->count() < 1){
            Session::flash('flash_message','É preciso criar uma categoria antes de cadastrar um post.');
            return redirect()->action('Admin\CategoriesController@create', $site->id);
        }
        $categories = $site->categories->pluck('title', 'id');
        return view('admin.posts.edit', compact('site', 'post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site, Post $post)
    {
        $file = $request->image;
        $data = $request->all();
        if($request->hasFile('image')){
            $fileName = $this->fileService->uploadImage($file, $post->site->folder, 'posts');
            $data['image'] = $fileName;
        }else{
            $data['image'] = $post->image;
        };
        $post->update($data);
        return redirect()->action('Admin\PostsController@show', ['site_id' => $site->id, 'id' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site, Post $post)
    {
        $imgPath = base_path('../') . $post->site->folder . '/images/posts/' . $post->image;
        if(\File::exists($imgPath)){
            \File::delete($imgPath);
        }
        $post->delete();
        return redirect()->action('Admin\PostsController@index', ['site_id' => $site->id]);


    }
}
