<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //Getting all students from the database.
    public function index(){
        $students = Student::all();
        return response() -> json($students, 200);
    }

    // Create a new student.
    public function store(Request $request){
        $student = Student::create($request -> all());
        return response() -> json($student, 201);
    }
}
