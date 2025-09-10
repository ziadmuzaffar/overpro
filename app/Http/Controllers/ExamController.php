<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Group;
use App\Models\Level;
use App\Models\Section;
use App\Models\Student;
use App\Models\University;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    private string $root = 'pages.exams.';
    
    public function index()
    {
        return view($this->root.__FUNCTION__, [
            'universities' => University::all(),
            'sections' => Section::all(),
            'levels' => Level::all(),
            'groups' => Group::all()
        ]);
    }

    public function show(Request $request)
    {
        $exams = Exam::where('chapter', $request->chapter)->where('university_id', $request->university_id)->where('section_id', $request->section_id)->where('level_id', $request->level_id)->where('group_id', $request->group_id);
        if ($exams->count() == 0) {
            return view($this->root.'create', [
                'students' => Student::where('university_id', $request->university_id)->where('section_id', $request->section_id)->where('level_id', $request->level_id)->where('group_id', $request->group_id)->get(),
                'request' => $request
            ]);
        } else {
            return view($this->root.'edit', [
                'exams' => $exams->get()
            ]);
        }
    }

    public function store(Request $request)
    {
        foreach ($request->degree as $student_id => $degree) {
            Exam::create([
                'chapter' => $request->chapter,
                'student_id' => $student_id,
                'university_id' => $request->university_id,
                'section_id' => $request->section_id,
                'level_id' => $request->level_id,
                'group_id' => $request->group_id,
                'degree' => $degree
            ]);
        }
        return redirect()->route('exams.index');
    }

    public function update(Request $request, Exam $exam)
    {
        foreach ($request->degree as $id => $degree) {
            Exam::where('id', $id)->update(['degree' => $degree]);
        }
        return redirect()->route('exams.index');
    }
}
