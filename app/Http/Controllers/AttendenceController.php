<?php

namespace App\Http\Controllers;

use App\Http\Resources\AttendenceResource;
use App\Http\Requests\AttendenceRequest;
use App\Models\Attendence;
use Attribute;
use Illuminate\Http\Request;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //   return 'data';
        //
        $attendences = Attendence::all();

        // return response()->json([
        //     "data" => $attendences
        // ],200);

        return $this->successResponse($attendences, "attendences data list");
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(AttendenceRequest $request)
    {
        //
        $validator = $request->validated();
        $attendence = Attendence::create($validator);

        if ($attendence) {
            # code...
            return $this->successResponse(new AttendenceResource($attendence), "attendence created");
        } else {
            return $this->errorResponse("fail");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendence $attendence)
    {
        //
        if ($attendence) {
            # code...
            return $this->successResponse($attendence, "attendence here");
        } else {
            return $this->errorResponse("fail");
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(AttendenceRequest $request, Attendence $attendence)
    {
        //
        $validator = $request->validated();

        if ($attendence->update($validator)) {
            # code...
            return $this->successResponse(new AttendenceResource($attendence), "update!");
        } else {
            return $this->errorResponse("update fail");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendence $attendence)
    {
        //
        if ($attendence->delete()) {
            # code...
            return $this->successResponse($attendence, "delete!");
        } else {
            return $this->errorResponse("delete fail");
        }
    }
}
