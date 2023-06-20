<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $team = Team::with('project')->get();
        if($team){
            return $this->successResponse($team, "Get Team Successfully");
        }
        return $this->errorResponse("Get Team Failed");
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',

        ]);
        $team = Team::create($validated);

        if($team){
            return $this->successResponse($team, "Create Team Successfully");
        }
        return $this->errorResponse("Create Team Failed");
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        $team = Team::with('project')->find($team->id);
        return response()->json([
            'team' => $team,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $validated = $request->validate([
            'name' => 'required|string',

        ]);

        $team = $team->update($validated);
        if($team){
            return $this->successResponse($team, "Updated team Successfully");
        }
        return $this->errorResponse("Updated Project Failed");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $team = $team->delete();
            if($team){
                return $this->successResponse($team, "Deleted team Successfully");
            }
            return $this->errorResponse("Deleted team Failed");

    }
}
