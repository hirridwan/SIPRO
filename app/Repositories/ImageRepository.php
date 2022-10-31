<?php

namespace App\Repositories;
use Image;

class ImageRepository
{
    public function fitImageUploads($image,$destinationPath,$width,$height)
    {
        
        $input['imagename']=time().'.'.$image->getClientOriginalExtension();
        $img = Image::make($image->path());
        $img->fit($width,$height)->save($destinationPath.'\\'.$input['imagename']);

        $image_path=$destinationPath.'/'.$input['imagename'];

        return $image_path;
    }
}