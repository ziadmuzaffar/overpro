<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Section;
use App\Models\University;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    private string $root = 'pages.levels.';

    public function index()
    {
        return view($this->root.__FUNCTION__, [
            'levels' => Level::all()
        ]);
    }

    public function create()
    {
        return view($this->root.__FUNCTION__, [
            'universities' => University::all(),
            'sections' => Section::all()
        ]);
    }

    public function store(Request $request)
    {
        Level::create($request->all());
        return back();
    }

    public function show(Level $level)
    {
        return view($this->root.__FUNCTION__, compact('level'));
    }

    public function edit(Level $level)
    {
        return view($this->root.__FUNCTION__, [
            'universities' => University::all(),
            'sections' => Section::all(),
            'level' => $level
        ]);
    }

    public function update(Request $request, Level $level)
    {
        $level->update($request->all());
        return back();
    }

    public function destroy(Level $level)
    {
        $level->delete();
        return back();
    }
}
