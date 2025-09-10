<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Level;
use App\Models\Section;
use App\Models\Student;
use App\Models\University;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private string $root = 'pages.students.';

    public function index()
    {
        return view($this->root.__FUNCTION__, [
            'students' => Student::all()
        ]);
    }

    public function create()
    {
        return view($this->root.__FUNCTION__, [
            'universities' => University::all(),
            'sections' => Section::all(),
            'levels' => Level::all(),
            'groups' => Group::all(),
        ]);
    }

    public function store(Request $request)
    {
        Student::create($request->all());
        return back();
    }

    public function show(Student $student)
    {
        return view($this->root.__FUNCTION__, compact('student'));
    }

    public function edit(Student $student)
    {
        return view($this->root.__FUNCTION__, [
            'universities' => University::all(),
            'sections' => Section::all(),
            'levels' => Level::all(),
            'groups' => Group::all(),
            'student' => $student
        ]);
    }

    public function update(Request $request, Student $student)
    {
        $student->update($request->all());
        return back();
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return back();
    }
}
