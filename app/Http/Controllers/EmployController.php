<?php

namespace App\Http\Controllers;


use App\Models\Employ;

use Illuminate\Http\Request;
use App\Http\Requests\EmployRequest;



class EmployController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employs = Employ::all();
        return $this->successResponse($employs, "employs list");
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployRequest $request)
    {
        //

        $validator = $request->validated();

        if ($employ = Employ::create($validator)) {

            return $this->successResponse($employ, "employ created");
        } else {
            return $this->errorResponse("employ created fail");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employ $employ)
    {

        if ($employ) {
            return $this->successResponse($employ, "employ detail");
        } else {
            return $this->errorResponse("no detail for employ");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployRequest $request, Employ $employ)
    {
        //
        $validator = $request->validated();

        if ($employ->update($validator)) {
            # code...
            return $this->successResponse($employ, "update cmpleted");
        } else {
            return $this->errorResponse("cant update");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employ $employ)
    {



        if ($employ->delete()) {
            # code...
            return $this->successResponse($employ, "delete cmpleted");
        } else {
            return $this->errorResponse("cant delete");
        }

    }
}
