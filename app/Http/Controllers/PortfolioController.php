<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function display()
    {
        $about = About::first();

        return view('welcome', compact('about'));
    }
}
