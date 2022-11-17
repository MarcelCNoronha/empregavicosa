<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Support\Facades\Validator;

class ExperienceController extends Controller
{
    use Traits\CrudTrait;

    public $model;

    public function __construct(Experience $experience)
    {
        $this->model = $experience;
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
        return Experience::where('user_id', $user_id)
                            ->orderBy('name', 'asc')
                            ->get();
    }

    private function validation(Array $data)
    {
        return Validator::make($data, [
            'name'                  => 'required',
            'description'           => 'required',
            'user_id'               => 'required',
            'active'                => 'required'
        ],[
            'name.required'         => 'O campo name é obrigatório',
            'description.required'  => 'O campo description é obrigatório',
            'user_id.required'      => 'O campo user_id é obrigatório',
            'active.required'       => 'O campo active é obrigatório'
        ]);
    }
}
