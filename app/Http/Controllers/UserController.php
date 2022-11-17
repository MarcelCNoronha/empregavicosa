<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use Traits\CrudTrait;

    public $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function authenticate(Request $request)
    {
        $credentials = [
            'email'     => $request->data['email'],
            'password'  => $request->data['password']
        ];

        $user = User::where('email', $request->data['email'])->first();

        if(empty($user)) {
            return [
                "success" => false,
                "message" => "Email inexistente"
            ];
        }

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            $user = Auth::user();

            return [
                "success" => true,
                "message" => $user->id
            ];
        }

        return [
            "success" => false,
            "message" => "Senha incorreta"
        ];
    }

    public function userAuthenticate()
    {
        $user = Auth::user();

        if(empty($user)) {
            return [
                "success" => false,
                "message" => "Não existe usuário autenticado"
            ];
        }

        return [
            "success"   => true,
            "data"      => $user
        ];
    }
}
