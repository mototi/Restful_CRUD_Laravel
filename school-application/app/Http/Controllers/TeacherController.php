<?php

namespace App\Http\Controllers;

use App\Http\Resources\TeachersResource;
use App\Models\Teacher;
use App\Http\Requests\Teachers\DeleteTeacher;
use App\Http\Requests\Teachers\UpdateTeacher;
use App\Http\Requests\Teachers\CreateTeacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    // get all teachers
    public function getAll()
    {
        try{
            $teachers = Teacher::all();
            return TeachersResource::collection($teachers);
        }catch(\Exception $e){
            return response()->json([
                "message" => "Unable to retrieve teachers",
                "error" => $e->getMessage(),
            ], 500);
        }
    }

    //get teacher by id
    public function getById($id)
    {
        try{
            $teacher = Teacher::findOrfail($id);
            return new TeachersResource($teacher);
        }catch(\Exception $e){
            return response()->json([
                "message" => "Unable to retrieve teacher",
                "error" => $e->getMessage(),
            ], 500);
        }
    }


    // create a new teacher
    public function createNewTeacher(CreateTeacher $request)
    {
        try{
            $teacher = $request->assignTeacher();
            return response()->json([
                "message" => "Teacher created successfully",
                "data" => $teacher,
            ], 201);
        }catch(\Exception $e){
            return response()->json([
                "message" => "Unable to create teacher",
                "error" => $e->getMessage(),
            ], 500);
        }

    }

    // update teacher
    public function changesInTeacher(UpdateTeacher $request)
    {
        try{
            $teacher = $request->updateTeacher();
            return response()->json([
                "message" => "Teacher updated successfully",
                "data" => $teacher,
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                "message" => "Unable to update teacher",
                "error" => $e->getMessage(),
            ], 500);
        }
    }

    // delete teacher
    public function deleteTeacher($id)
    {
        try{
            $request = new DeleteTeacher();
            $request->deleteTeacher($id);
            return response()->json([
                "message" => "Teacher deleted successfully",
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                "message" => "Unable to delete teacher",
                "error" => $e->getMessage(),
            ], 500);
        }
    }
}
