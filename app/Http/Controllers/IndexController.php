<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function show(Request $request)
    {
        return view('index', [
            'projects' => Project::select('heading', 'start_date', 'completion_date', 'website_link', 'github_link')->get()->toArray(),
        ]);
    }
}
