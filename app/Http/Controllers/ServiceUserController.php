<?php

namespace App\Http\Controllers;

use App\Models\ServiceUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceUserController extends Controller
{
    public function __construct(ServiceUser $serviceUser)
    {
        $this->middleware('auth')->only([
            'storeArray'
        ]);
    }

    public function storeArray(Request $request)
    {
        $data = $request->all();
        self::validation($data)->validate();
        $user = User::find($request['user_id']);
        self::deleteAllByUser($user);
        $user->services()->attach($request['services']);
        return User::find($user->id);
    }

    public static function deleteAllByUser(User $user)
    {
        $serviceUser = ServiceUser::where('user_id', $user->id)->get();
        foreach ($serviceUser as $obj) {
            $obj->delete();
        }
        return;
    }

    private static function validation(Array $data)
    {
        return Validator::make($data, [
            "user_id"       => "required",
            "services"      => "required|array"
        ],[
            "user_id.required"  => "O campo :user_id é obrigatório",
            "services.required" => "O campo :services é obrigatório",
            "services.array"    => "O campo :services tem que ser um array"
        ]);
    }
}
