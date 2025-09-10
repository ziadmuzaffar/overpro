<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Level;
use App\Models\Section;
use App\Models\University;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    private string $root = 'pages.groups.';

    public function index()
    {
        return view($this->root.__FUNCTION__, [
            'groups' => Group::all()
        ]);
    }

    public function create()
    {
        return view($this->root.__FUNCTION__, [
            'universities' => University::all(),
            'sections' => Section::all(),
            'levels' => Level::all()
        ]);
    }

    public function store(Request $request)
    {
        Group::create($request->all());
        return back();
    }

    public function show(Group $group)
    {
        return view($this->root.__FUNCTION__, compact('group'));
    }

    public function edit(Group $group)
    {
        return view($this->root.__FUNCTION__, [
            'universities' => University::all(),
            'sections' => Section::all(),
            'levels' => Level::all(),
            'group' => $group
        ]);
    }

    public function update(Request $request, Group $group)
    {
        $group->update($request->all());
        return back();
    }

    public function destroy(Group $group)
    {
        $group->delete();
        return back();
    }
}
