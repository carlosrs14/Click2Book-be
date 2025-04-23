<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller {
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'mensaje' => 'Usuario registrado con éxito',
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_email' => $user->email,
            'user_role' => $user->role,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ]);
    }

    public function get_all() {
        return User::all();
    }

    public function get($id) {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['mensaje' => 'Usuario no encontrado'], 404);
        }
        return response()->json([$user]);
    }
    
    public function update(Request $request, $id) {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['mensaje' => 'Usuario no encontrado'], 404);
        }

        $validated = $request->validate([
            'name' => 'string|max:255',
            'email' => 'email|unique:users,email,',
        ]);

        $user->name = $validated['name'] ?? $user->name;
        $user->email = $validated['email'] ?? $user->email;
        $user->save();
        return response()->json(['mensaje' => 'Usuario actualizado']);
    }

    public function delete($id) {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['mensaje' => 'Usuario no encontrado'], 404);
        }
        $user->delete();
        return response()->json(['mensaje' => 'Usuario borrado']);
    }
}
