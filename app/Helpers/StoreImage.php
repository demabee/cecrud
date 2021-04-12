<?php

namespace App\Helpers;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class StoreImage {

  public static function store_image($image){
    $logo = $image;

    $file_name = time() . '.' . $logo->getClientOriginalExtension();
    $image = Image::make($logo->getRealPath());

    $image->resize(200, 200, function($cons){
      $cons->aspectRatio();
    });

    $image->stream();

    Storage::disk('local')->put('/public/images/'. $file_name, $image, 'public');

    return $file_name;
  }
}