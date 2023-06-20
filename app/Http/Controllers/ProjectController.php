<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Team;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $project = Project::with('team')->get();
        if($project){
            return $this->successResponse($project, "Get Project Successfully");
        }
        return $this->errorResponse("Get Project Failed");
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'duration' => 'required|string',
            'team' => 'required|integer',
        ]);
        $team_data = Team::find($validated['team'])->get();
        if($team_data) {
            $team = $validated['team'];
            $project = Project::create([
                'name' => $validated['name'],
                'duration' => $validated['duration'],
            ]);


            $project->team()->sync($team);

            // $project = Project::create($validated);

            if($project){
                return $this->successResponse($project, "Create Project Successfully");
            }
            return $this->errorResponse("Create Project Failed");
        }
        else {
            return $this->errorResponse("Your Team is not there!");
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project = Project::with('team')->find($project->id);
        return response()->json([
            'project' => $project,
        ]);

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'duration' => 'required|string',
            'team' => 'required|integer',
        ]);
        $team_data = Team::find($validated['team'])->get();
        if($team_data) {
            $project->update($validated);

            $team = $validated['team'];
            $project_team = $project->team()->sync($team);
            // dd($project_team);

            if($project){
                return $this->successResponse($project, "Updated Project Successfully");
            }
            return $this->errorResponse("Updated Project Failed");
        }
        else {
            return $this->errorResponse("Your Team is not there!");
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {

        $project->team()->detach();
        $project = $project->delete();
        if($project){
            return $this->successResponse($project, "Deleted Project Successfully");
        }
        return $this->errorResponse("Deleted Project Failed");
    }
}
