?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $att = Attendance::with('employee')->get();

        return $this->successResponse($att, "employs list");
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'datetime' => 'required',
            'status' => 'required',
            'employee_id' => 'required',
        ]);


        $attendance = Attendance::create($validated);
        if($attendance) {
            return $this->successResponse($attendance, "Create Attendance successfully");
        }

        return $this->errorResponse("Create Attendance successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        $attendance = $attendance->with('employee')->find($attendance->id);
        if($attendance) {
            return $this->successResponse($attendance, "Get an attendance detail successfully");
        }
        return $this->errorResponse("Get an attendance detail not successfully");
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        $validated = $request->validate([
            'datetime' => 'required',
            'status' => 'required',
            'employee_id' => 'required',
        ]);

        $attendance= $attendance->update($validated);

        if($attendance) {
            return $this->successResponse($attendance, "Update an attendance successfully");
        }
        return $this->errorResponse("Update an attendance  not successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        if ($attendance->delete()) {
            # code...
            return $this->successResponse($attendance, "delete cmpleted");
        } else {
            return $this->errorResponse("cant delete");
        }
    }
}
