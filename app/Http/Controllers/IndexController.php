<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Slide;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function show(Request $request)
    {
        return view('index', [
            'projects' => Project::with('slides')->get()->sortBy('position'),
        ]);
    }
}
