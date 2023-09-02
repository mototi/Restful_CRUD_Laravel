<?php

namespace App\Http\Controllers;

use App\Http\Requests\Teachers\CreateTeacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    // create a new teacher
    public function createNewTeacher(CreateTeacher $request)
    {
        try{
            $teacher = $request->assignTeacher();
            return response()->json([
                "message" => "Teacher created successfully",
                "teacher" => $teacher,
            ], 201);
        }catch(\Exception $e){
            return response()->json([
                "message" => "Unable to create teacher",
                "error" => $e->getMessage(),
            ], 500);
        }

    }
}
