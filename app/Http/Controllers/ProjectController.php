<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Skill;
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

    public function store(StoreProjectRequest $request)
    {
        $skills = $request->skills;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('projects');

            $project = Project::create([
                'name' => $request->name,
                'image' => $image,
                'project_url' => $request->project_url,
            ]);

            $project->skills()->attach($request->skills);

            return to_route('skills.index')->with('success', 'New skill created');
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


    public function update(UpdateProjectRequest $request, Project $project)
    {
        $image = $project->image;

        if ($request->hasFile('image')) {
            Storage::delete($project->image);
            $image = $request->file('image')->store('projects');
        }

        $project->update([
            'name' => $request->name,
            'image' => $image,
            'project_url' => $request->project_url
        ]);

        $project->skills()->sync($request->skills);

        return to_route('projects.index')->with('success', 'Project updated');
    }

    public function destroy(Project $project)
    {
        Storage::delete($project->image);
        $project->delete();
        return back()->with('danger', 'Project deleted');
    }
}
