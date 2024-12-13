<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    private static $users = [
        1 => ['id' => 1, 'name' => 'Juan', 'email' => 'juan@example.com'],
        2 => ['id' => 2, 'name' => 'María', 'email' => 'maria@example.com']
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(self::$users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json(['message' => 'Aquí mostraríamos un formulario para crear un usuario']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');

        $newId = count(self::$users) ? max(array_keys(self::$users)) + 1 : 1;

        $newUser = [
            'id' => $newId,
            'name' => $name,
            'email' => $email
        ];

        self::$users[$newId] = $newUser;

        return response()->json(['message' => 'Usuario creado', 'user' => $newUser]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (isset(self::$users[$id])) {
            return response()->json(self::$users[$id]);
        } else {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (isset(self::$users[$id])) {
            return response()->json(['message' => 'Aquí mostraríamos el formulario de edición', 'user' => self::$users[$id]]);
        } else {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (isset(self::$users[$id])) {
            $name = $request->input('name');
            $email = $request->input('email');

            self::$users[$id]['name'] = $name ?? self::$users[$id]['name'];
            self::$users[$id]['email'] = $email ?? self::$users[$id]['email'];

            return response()->json(['message' => 'Usuario actualizado', 'user' => self::$users[$id]]);
        } else {
            return response->json(['message' => 'Usuario no encontrado'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (isset(self::$users[$id])) {
            unset(self::$users[$id]);
            return response()->json(['message' => 'Usuario eliminado']);
        } else {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
    }
}
