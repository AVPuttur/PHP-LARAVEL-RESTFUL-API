<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Student as StudentResource;
use App\Student;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all records
        $students = Student::get()->toJson(JSON_PRETTY_PRINT);
        return response($students, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create record
        $student = new Student;

        $student->FNAME = $request->nom;
        $student->LNAME = $request->prenom;
        $student->EMAIL = $request->EMAIL;
        $student->TELEPHONE = $request->TELEPHONE; 
        $student->save();

        return response()->json([
            "message" => "A new student record inserted"], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show record by id
        if (Student::where('id', $id)->exists()) {
            $student = Student::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);

            return response($student, 200);

        }else {
            return response()->json([
                "message" => "No record found from this user"], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update record
        if (Student::where('id', $id)->exists()) {
            $student = Student::find($id);
            $student->FNAME = is_null($request->FNAME) ? $student->FNAME : $request->FNAME;
            $student->LNAME = is_null($request->LNAME) ? $student->LNAME : $request->LNAME;
            $student->EMAIL = is_null($request->EMAIL) ? $student->EMAIL : $request->EMAIL;
            $student->TELEPHONE = is_null($request->TELEPHONE) ? $student->TELEPHONE : $request->TELEPHONE;
            $student->save();

            return response()->json([
                "message" => "Record updated successfully"
            ], 200);

        } else {
            return response()->json(["message" => "Record not found"], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete record
        if (Student::where('id', $id)->exists()) {
            $student = Student::find($id);
            $student->delete();

            return response()->json(["message" => "Record number ".$student->FNAME." deleted."], 200);
        }else {
            return response()->json(["message" => "Record not found."], 404);
        }
    }
}
