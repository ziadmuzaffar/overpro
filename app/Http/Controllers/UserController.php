<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private string $root = 'pages.users.';
    public function index() {}

    public function create() {}

    public function store(Request $request) {}

    public function show(User $user) {}

    public function edit(User $user)
    {
        return view($this->root.__FUNCTION__, compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->all();
        if (!$request->password) unset($data['password']);
        return $data;
        $user->update($data);
        return back();
    }

    public function destroy(User $user) {}
}
