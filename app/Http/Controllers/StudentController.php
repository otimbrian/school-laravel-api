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

    // Implementing an Update on the student.
    public function update(Request $request, $studentId){
        $validatedData = $request -> validate([
            'first_name' => 'string|required',
            'last_name' => 'string|required',
            'age' => 'string|required',
            'class' => 'string|required'
        ]);

        $student = Student::findOrFail($studentId);
        $student->update($validatedData);

        return response() -> json(['message' => 'Update Succesful'], 200);
    }

    // Implementing the delete.
    public function destroy($studentId){
        // Finding the student by ID.

        $student = Student::findOrFail($studentId);
        $student->delete();

        return response() -> json(204);
    }
}
