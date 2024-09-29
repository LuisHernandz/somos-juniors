<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        $inputs = $request->input();
        $e = User::create($inputs);
        return response()->json([
            'data'=>$e,
            'mensaje'=>"Usuario creado con éxito.",
        ]); 
    }

    public function show(string $id)
    {
        $e = User::find($id);
        if (isset($e)){
            if ($e->save()){
                return response()->json([
                    'data'=>$e,
                    'mensaje'=>"Usuario encontrado con éxito.",
                ]); 
            };
        }else{
            return response()->json([
                'error'=>true,
                'mensaje'=>"No existe el usuario.",
            ]);
        };
    }

    public function update(Request $request, string $id)
    {
        $e = User::find($id);
        if (isset($e)){
            $e->name = $request->name;
            $e->email = $request->email;
            $e->password = Hash::make($request->password);
            if ($e->save()){
                return response()->json([
                    'data'=>$e,
                    'mensaje'=>"Usuario actualizado con éxito.",
                ]); 
            };
        }else{
            return response()->json([
                'error'=>true,
                'mensaje'=>"No se pudo actualizar el usuario.",
            ]);
        };
    }

    public function destroy(string $id)
    {
        $e = User::find($id);
        if (isset($e)){
            $res = User::destroy($id);
            if ($res) {
                return response()->json([
                    'data'=>$e,
                    'mensaje'=>"Usuario eliminado con éxito.",
                ]); 
            }else{
                return response()->json([
                    'data'=>$e,
                    'mensaje'=>"No existe el usuario.",
                ]);
            }
        }else{
            return response()->json([
                'error'=>true,
                'mensaje'=>"No existe el usuario.",
            ]);
        };
    }
}