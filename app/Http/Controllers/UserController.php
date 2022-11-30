<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
            'email'     => $request->email,
            'password'  => $request->password
        ];

        $user = User::where('email', $request->email)->first();

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

    public function isUser(String $email)
    {
        $user = User::where('email', $email)->first();

        if(empty($user)) {
            return [
                'success' => false
            ];
        }

        return [
            'success' => true
        ];
    }

    private function validation(Array $data)
    {
        return Validator::make($data, [
            'email'     => 'required',
            'name'      => 'required',
            'phone'     => 'required',
            'active'    => 'required',
            'age'       => 'required',
            'password'  => 'required'
        ],[
            'email.required'        => 'O campo email é obrigatório',
            'name.required'         => 'O campo name é obrigatório',
            'phone.required'        => 'O campo phone é obrigatório',
            'age.required'          => 'O campo age é obrigatório',
            'password.required'     => 'O campo password é obrigatório',
            'active.required'       => 'O campo active é obrigatório'
        ]);
    }
}
