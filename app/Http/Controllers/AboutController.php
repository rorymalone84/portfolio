<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use App\Services\S3UploadService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();

        return view('about.index', compact('about'));
    }


    public function create()
    {
        return view('about.create');
    }


    public function store(StoreAboutRequest $request, S3UploadService $s3UploadService)
    {
        if ($request->hasFile('image')) {
            $image_name = $s3UploadService->store_upload($request);

            About::create([
                'description' => $request->description,
                'image' => $image_name,
            ]);

            return to_route('about.index')->with('success', 'About section created');
        }

        return back();
    }


    public function edit(About $about)
    {
        return view('about.edit', compact('about'));
    }


    public function update(UpdateAboutRequest $request, About $about, S3UploadService $s3UploadService)
    {
        $image_name = $about->image;

        if ($request->hasFile('image')) {
            if (Storage::disk('s3')->exists('rm-portfolio-images/' . $image_name)) {
                Storage::disk('s3')->delete('rm-portfolio-images/' . $image_name);
            } else {
                return back()->with('danger', 'About image not deleted from s3');
            }
            $image_name = $s3UploadService->update_upload($request);
        }

        $about->update([
            'description' => $request->description,
            'image' => $image_name
        ]);

        return to_route('about.index')->with('success', 'About section updated');
    }
}
