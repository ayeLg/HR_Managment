<?php

namespace App\Http\Controllers;

// use App\Http\Resources\EmployResource;

use App\Http\Requests\EmployRequest;
use App\Models\Employ;
// use Illuminate\Http\Request;
use Illuminate\Http\Request;
// use App\Http\Requests\EmployRequest;
// use App\Http\Requests\EmployRequest;
// use App\Http\Requests\EmployRequest;
use Illuminate\Support\Facades\Validator;



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
    public function store(Request $request)
    {
        //
        // $validator = validator::make($request->all());

        $validator = $request->validate([
            "fullname" => "required|string",
            "email" => "required|string|email",
            "password" => "required|string|",
            "phone" => "integer",
            "photo" => "string",
            "position" => "required|string|",
            "salary" => "required|integer|",
        ]);

        // $validator = $this->validated();

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
        //
        if ($employ) {
            return $this->successResponse($employ, "employ detail");
        } else {
            return $this->errorResponse("no detail for employ");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employ $employ)
    {
        //
        // $validator = $this->validated();

        $validator = $request->validate([
            "fullname" => "required|string",
            "email" => "required|string|email",
            "password" => "required|string|",
            "phone" => "integer",
            "photo" => "string",
            "position" => "required|string|",
            "salary" => "required|integer|",
        ]);

        // $validated = $request->validated();

        if ($employ->update($validator)) {
            return $this->successResponse($employ, "employ updated successfully");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employ $employ)
    {

        // $validator = $this->validated();


        $employ->delete();

        # code...
        return $this->successResponse($employ, "delete cmpleted");

        //
    }
}








    // ???? validator ????
//     private function validator($request)
//     {
//         $validationRulesPass =
//             [
//                 "fullname" => "required|string",
//                 "email" => "required|string|email",
//                 "password" => "required|string|",
//                 "phone" => "required|string|",
//                 "photo" => "string",
//                 // "postion" => "required|string|",
//                 "salary" => "required|integer|",
//             ];



//         $validationMessagePass =
//             [
//                 'fullname.required' => "need to fill fullname",
//                 'email.required' => "need to fill email",
//                 'password.required' => "need to fill password",
//                 'phone.required' => "need to fill phone",
//                 //  'photo.required' => "need to fill photo",
//                 // 'position.required' => "need to fill position",
//                 'salary.required' => "need to fill fullname",
//             ];
//         validator::make($request->all(), $validationRulesPass, $validationMessagePass)->validate();
//     }
// }

// validation
//  $validationRule = [
//     "posttitle" => "required|unique:posts,title|min:5",
//     "postdescription" => "required"
// ];
// $validationMessage =[
//     'posttitle.required' => 'title ဖြည့်ပါ'  ,
//     'posttitle.unique' => 'title တူနေသညါ' ,
//     'posttitle.min' => 'ငါးလူံးလိုတယ်' ,
//     'postdescription.required' => 'description ဖြည့်ပါ'
// ];
// Validator::make($req->all(), $validationRule,$validationMessage)->validate();



    // private function getData($request)
    // {
    //     return [
    //         'category_id' => $request->categoryId,
    //         'title' => $request->categoryName,
    //         'description'   => $request->categoryDescription,
    //         'created_at' => Carbon::now(),
    //         'updated_at' => Carbon::now(),
    //     ];
    // }
