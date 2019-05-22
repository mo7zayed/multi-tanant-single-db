<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Project;

class DashboardController extends Controller
{
    public function index()
    {
        return view('tanant.projects', [
            'projects' => Project::all(),
        ]);
    }
}
