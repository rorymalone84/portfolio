<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Skill;
use App\Services\S3UploadService;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{

    public function index()
    {
        $projects =  Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $skills = Skill::all();

        return view('projects.create', compact('skills'));
    }

    public function store(StoreProjectRequest $request, S3UploadService $s3UploadService)
    {
        if ($request->hasFile('image')) {

            $image_name = $s3UploadService->store_upload($request);

            $project = Project::create([
                'name' => $request->name,
                'image' => $image_name,
                'project_url' => $request->project_url,
            ]);

            $project->skills()->attach($request->skills);

            return to_route('skills.index')->with('success', 'New project created');
        }

        return back();
    }


    public function edit(Project $project)
    {
        $skills = Skill::all();

        //stores the 'checked' skills from the project_skills pivot table for the current
        //project model
        $skillCheck = array();

        //retreives the skills for the current project model
        foreach ($project->skills as $skill) {
            $skillCheck[] = $skill->id;
        }

        return view('projects.edit', compact('project', 'skills', 'skillCheck'));
    }


    public function update(UpdateProjectRequest $request, Project $project, S3UploadService $s3UploadService)
    {
        $image_name = $project->image;

        if ($request->hasFile('image')) {
            if (Storage::disk('s3')->exists('rm-portfolio-images/' . $image_name)) {
                Storage::disk('s3')->delete('rm-portfolio-images/' . $image_name);
            } else {
                return back()->with('danger', 'Skill not deleted from s3');
            }
            $image_name = $s3UploadService->update_upload($request);
        }

        $project->update([
            'name' => $request->name,
            'image' => $image_name,
            'project_url' => $request->project_url
        ]);

        $project->skills()->sync($request->skills);

        return to_route('projects.index')->with('success', 'Project updated');
    }

    public function destroy(Project $project)
    {
        $image_name = $project->image;
        if (Storage::disk('s3')->exists('rm-portfolio-images/' . $image_name)) {
            Storage::disk('s3')->delete('rm-portfolio-images/' . $image_name);
        } else {
            return back()->with('danger', 'Project not deleted from s3');
        }
        $project->delete();
        return back()->with('danger', 'Project deleted');
    }
}
