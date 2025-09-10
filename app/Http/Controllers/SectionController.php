<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\University;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    private string $root = 'pages.sections.';

    public function index()
    {
        return view($this->root.__FUNCTION__, [
            'sections' => Section::all()
        ]);
    }

    public function create()
    {
        return view($this->root.__FUNCTION__, [
            'universities' => University::all()
        ]);
    }

    public function store(Request $request)
    {
        Section::create($request->all());
        return back();
    }

    public function show(Section $section)
    {
        return view($this->root.__FUNCTION__, compact('section'));
    }

    public function edit(Section $section)
    {
        return view($this->root.__FUNCTION__, [
            'universities' => University::all(),
            'section' => $section
        ]);
    }

    public function update(Request $request, Section $section)
    {
        $section->update($request->all());
        return back();
    }

    public function destroy(Section $section)
    {
        $section->delete();
        return back();
    }
}
