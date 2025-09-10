<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    private string $root = 'pages.universities.';

    public function index()
    {
        return view($this->root.__FUNCTION__, [
            'universities' => University::all()
        ]);
    }

    public function create()
    {
        return view($this->root.__FUNCTION__);
    }

    public function store(Request $request)
    {
        University::create($request->all());
        return back();
    }

    public function show(University $university)
    {
        return view($this->root.__FUNCTION__, compact('university'));
    }

    public function edit(University $university)
    {
        return view($this->root.__FUNCTION__, compact('university'));
    }

    public function update(Request $request, University $university)
    {
        $university->update($request->all());
        return back();
    }

    public function destroy(University $university)
    {
        $university->delete();
        return back();
    }
}
