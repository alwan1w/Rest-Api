<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'photo' => 'nullable|image|max:2048', // Maks 2MB (2048 KB)
            'description' => 'nullable|string',
            'address' => 'nullable|string|max:255',
        ]);

        $data = $request->all();
        if ($request->hasFile('photo')) {
            $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('uploads'), $fileName);
            $data['photo'] = 'uploads/' . $fileName;
        }

        User::create($data);
        return redirect()->route('users.index')->with('success', 'User added!');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'photo' => 'nullable|image|max:2048', // Maks 2MB
            'description' => 'nullable|string',
            'address' => 'nullable|string|max:255',
        ]);

        $data = $request->all();
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($user->photo && file_exists(public_path($user->photo))) {
                unlink(public_path($user->photo));
            }
            $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('uploads'), $fileName);
            $data['photo'] = 'uploads/' . $fileName;
        }

        $user->update($data);
        return redirect()->route('users.index')->with('success', 'User updated!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->photo && file_exists(public_path($user->photo))) {
            unlink(public_path($user->photo));
        }
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted!');
    }
}
