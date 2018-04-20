<?php

namespace App\Http\Controllers\Admin;

use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

use App\Http\Requests;
use Response;

class FilesController extends Controller
{
    public function serveImage($site, $postOrPage, $filename)
    {
//        Versão para produção
//        $image = Image::make(base_path('../sites/'.$site.'/images/'.$postOrPage.'/'.$filename));
        $image = Image::make(base_path('../'.$site.'/images/'.$postOrPage.'/'.$filename));

        return $image->response();
    }
}
