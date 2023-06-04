<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Admin::all();

        return $this->successReqonse($admin, "Get all admin successfully");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(AdminRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);
        $admin = Admin::create($validated);
        return $this->successReqonse($admin, "Create a admin successfully");
    }



    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        return $admin;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, Admin $admin)
    {
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);
        if($admin->update($validated)) {
            return $this->successReqonse($admin, "Admin Updated Successfully");
        }

        return $this->errorResponse("admin updated not successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        if($admin->delete()) {
            return $this->successReqonse($admin, "Admin deleted Successfully");
        }
        return $this->errorResponse("admin deleted not successfully");
    }
}
