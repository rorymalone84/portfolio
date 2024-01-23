<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
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


    public function store(StoreAboutRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('about');

            About::create([
                'description' => $request->description,
                'image' => $image,
            ]);

            return to_route('about.index')->with('success', 'About section created');
        }

        return back();
    }


    public function edit(About $about)
    {
        return view('about.edit', compact('about'));
    }


    public function update(UpdateAboutRequest $request, About $about)
    {
        $image = $about->image;
        if ($request->hasFile('image')) {
            Storage::delete($about->image);
            $image = $request->file('image')->store('about');
        }

        $about->update([
            'description' => $request->description,
            'image' => $image
        ]);

        return to_route('about.index')->with('success', 'About section updated');
    }
}
