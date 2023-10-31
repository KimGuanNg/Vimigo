<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use Illuminate\Http\Request;
use App\Models\Student;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentImport;
use App\Exports\StudentExport;

class StudentController extends Controller
{
    public function importView(Request $request){
        return view('import-file');
    }
 
    public function import(Request $request){
        Excel::import(new StudentImport, 
                      $request->file('file')->store('files'));
        return redirect()->back();
    }
 
    public function exportUsers(Request $request){
        return Excel::download(new StudentExport, 'users.xlsx');
    } 

    
    
    public function index()
    {
        $students = Student::paginate(10);
        return StudentResource::collection($students);
    }

    public function show($id)
    {
        return StudentResource::find($id);
    }

    public function store(Request $request)
    {
        return StudentResource::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $student = StudentResource::find($id);
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
