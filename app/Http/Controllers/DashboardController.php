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

    public function storeProject(Request $request) {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Project::create([
            'name' => $request->name,
        ]);

        return redirect('/projects');
    }
}
