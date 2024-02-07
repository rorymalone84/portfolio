<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\About;
use App\Models\Skill;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{
    public function __invoke()
    {
        return view('portfolio')->with([
            'about' => About::first(),
            'skills' => Skill::all(),
            'projects' => Project::all(),
            'contact' => User::first(),
        ]);
    }
}