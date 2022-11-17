<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Support\Facades\Validator;

class PerfilController extends Controller
{  
    use Traits\CrudTrait;

    public $model;

    public function __construct(Perfil $perfil)
    {
        $this->model = $perfil;
        $this->middleware('auth')->only([
            'index',
            'show',
            'delete',
            'store',
            'update',
            'getByUser'
        ]);
    }

    public function getByUser($user_id)
    {
        return Perfil::where('user_id', $user_id)->orderBy('title', 'asc')->get();
    }
    
    public function validation(Array $data)
    {
        return Validator::make($data, [
            'title'         => 'required',
            'description'   => 'required',
            'user_id'       => 'required',
            'image'         => 'required',
            'active'        => 'required'
        ],[
            'title.required'            => 'O campo title é obrigatório',
            'description.required'      => 'O campo description é obrigatório',
            'user_id.required'          => 'O campo user_id é obrigatório',
            'image.required'            => 'O campo image é obrigatório',
            'active.required'           => 'O campo active é obrigatório',
        ]);
    }
}
