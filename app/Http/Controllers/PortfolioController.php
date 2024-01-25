<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function display()
    {
        return view('welcome')->with([
            'about' => About::first(),
            'skills' => Skill::all(),
            'projects' => Project::all()
        ]);
    }
}
