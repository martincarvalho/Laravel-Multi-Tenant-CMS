<?php

namespace App\Services;

use Intervention\Image\ImageManagerStatic as Image;

class FileService
{
    public function uploadImage($file, $folder, $typeOfContent, $width = "1920")
    {
        if($file->isValid()){
            $fileName = time() . '-' . $file->getClientOriginalName();
//            Versão produção
//            $path = base_path('../sites/') . $folder . '/images/' . $typeOfContent ;
            $path = base_path('../') . $folder . '/images/' . $typeOfContent ;
            if( ! \File::isDirectory($path) ) {
                \File::makeDirectory($path, 493, true);
            }
            $img = Image::make($file->getRealPath())->widen(intval($width), function ($constraint) {
                $constraint->upsize();
            })->save($path.'/'.$fileName);
            return $fileName;
        }
    }

}