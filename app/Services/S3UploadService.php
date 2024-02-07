<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class S3UploadService
{
    public function store_upload($request)
    {
        $extension  = request()->file('image')->getClientOriginalExtension(); //This is to get the extension of the image file just uploaded
        $image_name = time() . '_' . $request->name . '.' . $extension;
        $request->file('image')->storeAs(
            'rm-portfolio-images',
            $image_name,
            's3'
        );

        return $image_name;
    }

    public function update_upload($request)
    {

        $extension  = request()->file('image')->getClientOriginalExtension(); //This is to get the extension of the image file just uploaded
        $image_name = time() . '_' . $request->name . '.' . $extension;
        $request->file('image')->storeAs(
            'rm-portfolio-images',
            $image_name,
            's3'
        );

        return $image_name;
    }
}
