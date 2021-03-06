<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('getImages');
    }
    public static function  getImages(){
        $dir = public_path() .DIRECTORY_SEPARATOR .  "images" .DIRECTORY_SEPARATOR . 'gallery' . DIRECTORY_SEPARATOR;
        $images = [];
        foreach(glob($dir .'*.*') as $image){
            $images[] = basename($image);
        }
        return  $images;
    }

    public function update(){
        return redirect()->back();
    }
    public function delete(){
        return redirect()->back();

    }
    public function index(){
        return redirect()->back();

    }
}
