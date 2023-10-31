<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        return Student::all();
    }

    public function show($id)
    {
        return Student::find($id);
    }

    public function store(Request $request)
    {
        return Student::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->update($request->all());
        return $student;
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return response()->json(null, 204);
    }
}
