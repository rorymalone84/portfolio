<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Services\S3UploadService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();

        return view('skills.index', compact('skills'));
    }

    public function create()
    {
        return view('skills.create');
    }

    public function store(StoreSkillRequest $request, S3UploadService $s3UploadService)
    {
        if ($request->hasFile('image')) {
            $image_name = $s3UploadService->store_upload($request);

            Skill::create([
                'name' => $request->name,
                'image' => $image_name
            ]);

            return to_route('skills.index')->with('success', 'New skill created');
        }

        return back()->with('danger', 'You missed something');
    }

    public function edit(Skill $skill)
    {
        return view('skills.edit', compact('skill'));
    }

    public function update(Skill $skill, UpdateSkillRequest $request, S3UploadService $s3UploadService)
    {
        $image_name = $skill->image;

        if ($request->hasFile('image')) {
            if (Storage::disk('s3')->exists('rm-portfolio-images/' . $image_name)) {
                Storage::disk('s3')->delete('rm-portfolio-images/' . $image_name);
            } else {
                return back()->with('danger', 'Skill image not deleted from s3');
            }
            $image_name = $s3UploadService->update_upload($request);
        }

        $skill->update([
            'name' => $request->name,
            'image' => $image_name
        ]);

        return to_route('skills.index')->with('success', 'Skill updated');
    }

    public function destroy(Skill $skill)
    {
        $image_name = $skill->image;
        if (Storage::disk('s3')->exists('rm-portfolio-images/' . $image_name)) {
            Storage::disk('s3')->delete('rm-portfolio-images/' . $image_name);
        } else {
            return back()->with('danger', 'Skill not deleted from s3');
        }
        $skill->delete();
        return back()->with('danger', 'Skill deleted');
    }
}
