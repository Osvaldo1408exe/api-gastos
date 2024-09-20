<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function index(Request $request) {
        $user= User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)){
            return response([
                'message' => 'Usuário ou senha incorretos'
            ]);
        }
        $token = $user->createToken('contaGest-token')->plainTextToken;

        $response= [
            'user' => $user,
            'token'=> $token
        ];
        return response($response, 201);
    }

    function register(Request $request){

        if (User::where('email', $request->email)->first()) {
            return response()->json([
                'message' => 'Email já cadastrado'
            ]); // Retornando 400 Bad Request
        }
        // Validando os campos obrigatórios
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:5'
        ]);

        try {
            // Criando o usuário
            User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']), // Hash da senha
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Usuário criado com sucesso!'
            ], 201); // Retornando 201 Created

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Não foi possível fazer o cadastro no momento'
            ], 500); // Retornando 500 Internal Server Error
        }
    }


}
