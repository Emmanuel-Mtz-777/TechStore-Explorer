<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return response()->json([
            'roles' => Role::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $role = Role::create($validated);

        return response()->json([
            'message' => 'Rol creado correctamente',
            'role' => $role
        ], 201);
    }

    public function show(Role $role)
    {
        return response()->json([
            'role' => $role
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $role->update($validated);

        return response()->json([
            'message' => 'Rol actualizado correctamente',
            'role' => $role
        ]);
    }


    // Eliminar un rol
    public function destroy(Role $role)
    {
        $role->delete();

        return response()->json([
            'message' => 'Rol eliminado correctamente'
        ]);
    }
}