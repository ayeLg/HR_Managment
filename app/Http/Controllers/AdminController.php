<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Admin::all();
        if($admin) {
            return $this->successResponse($admin, "Get all admin successfully");
        }

        return $this->errorResponse("Get all admin not successfully");

    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(AdminRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);
        $image = $validated['photo'];

        $admin = Admin::create($validated);

        if($admin) {
            return $this->successResponse($admin, "Create a admin successfully");
        }
        return $this->errorResponse("Create admin not successfully");
    }



    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        if($admin) {
            return $this->successResponse($admin, "Get a admin detail successfully");
        }
        return $this->errorResponse("Get a admin detail not successfully");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, Admin $admin)
    {

        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);
        $image = $validated['photo'];



        $path  = Storage::disk('public_uploads')->put('/medias/images',$image);
        $validated['photo'] = $path;

        if($admin->update($validated)) {
            return $this->successResponse($admin, "Admin Updated Successfully");
        }

        return $this->errorResponse("admin updated not successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        if($admin->delete()) {
            return $this->successResponse($admin, "Admin deleted Successfully");
        }
        return $this->errorResponse("admin deleted not successfully");
    }
}
