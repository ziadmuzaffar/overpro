<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Exam;
use App\Models\Group;
use App\Models\Level;
use App\Models\Section;
use App\Models\Student;
use App\Models\University;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    private string $root = 'pages.reports.';

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

        if ($request->type == 'attendance') {
            return view($this->root.'attendance', [
                'students' => Student::where('university_id', $request->university_id)->where('section_id', $request->section_id)->where('level_id', $request->level_id)->where('group_id', $request->group_id)->get(),
                'request' => $request
            ]);
        } elseif ($request->type == 'exams') {
            return view($this->root.'exams', [
                'exams' => Exam::where('university_id', $request->university_id)->where('section_id', $request->section_id)->where('level_id', $request->level_id)->where('group_id', $request->group_id)->get(),
                'request' => $request
            ]);
        }
    }
}
