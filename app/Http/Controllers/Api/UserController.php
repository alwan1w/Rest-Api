<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all(), 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'photo' => 'nullable|image|max:2048', // Maks 2MB
            'description' => 'nullable|string',
            'address' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->all();
        if ($request->hasFile('photo')) {
            $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('uploads'), $fileName);
            $data['photo'] = 'uploads/' . $fileName;
        }

        $user = User::create($data);
        return response()->json($user, 201);
    }

    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($user, 200);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,' . $id,
            'photo' => 'nullable|image|max:2048', // Maks 2MB
            'description' => 'nullable|string',
            'address' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->all();
        if ($request->hasFile('photo')) {
            if ($user->photo && file_exists(public_path($user->photo))) {
                unlink(public_path($user->photo));
            }
            $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('uploads'), $fileName);
            $data['photo'] = 'uploads/' . $fileName;
        }

        $user->update($data);
        return response()->json($user, 200);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        if ($user->photo && file_exists(public_path($user->photo))) {
            unlink(public_path($user->photo));
        }
        $user->delete();
        return response()->json(['message' => 'User deleted'], 200);
    }
}
