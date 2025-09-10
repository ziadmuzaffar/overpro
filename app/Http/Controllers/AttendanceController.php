<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Group;
use App\Models\Level;
use App\Models\Section;
use App\Models\Student;
use App\Models\University;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    private string $root = 'pages.attendances.';

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
        return view($this->root.'show', [
            'students' => Student::where('university_id', $request->university_id)->where('section_id', $request->section_id)->where('level_id', $request->level_id)->where('group_id', $request->group_id)->get(),
            'request' => $request
        ]);
    }

    public function store(Request $request)
    {
        $attendances = Attendance::where('lecture', $request->lecture)->where('student_id', $request->student_id);
        if ($attendances->count() == 0) {
            Attendance::create($request->all());
        } else {
            $attendances->update(['status' => $request->status]);
        }
    }
}
