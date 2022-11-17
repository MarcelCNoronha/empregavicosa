<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Support\Facades\Validator;

class PublicationController extends Controller
{
    use Traits\CrudTrait;

    public $model;

    public function __construct(Publication $publication)
    {
        $this->model = $publication;
        $this->middleware('auth')->only([
            'index',
            'show',
            'delete',
            'store',
            'update'            
        ]);
    }

    private function validation(Array $data)
    {
        return Validator::make($data, [
            'title'                  => 'required',
            'description'           => 'required',
            'user_id'               => 'required',
            'active'                => 'required'
        ],[
            'title.required'         => 'O campo titulo é obrigatório',
            'description.required'  => 'O campo description é obrigatório',
            'user_id.required'      => 'O campo user_id é obrigatório',
            'active.required'       => 'O campo active é obrigatório'
        ]);
    }
}
