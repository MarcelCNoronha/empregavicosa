<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudTrait;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    use Traits\CrudTrait;

    public $model;

    public function __construct(Service $service)
    {
        $this->model = $service;
        $this->middleware('auth')->only([
            'index',
            'show',
            'delete',
            'store',
            'update',
            'searchName'
        ]);
    }
    
    public function searchName($name)
    {
        return Service::where('name', $name)
                        ->orderBy('created_at', 'desc')
                        ->first();
    }   

    private function validation(Array $data)
    {
        return Validator::make($data, [
            'name'          => 'required',
            'description'   => 'required'
        ], [
            'name.required'         => 'O campo name é obrigatório',
            'description.required'  => 'O campo description é obrigatório'
        ]);
    }
}
