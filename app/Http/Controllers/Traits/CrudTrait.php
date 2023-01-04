<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

trait CrudTrait 
{
    public $model;

    public function index()
    {
        return $this->model::orderBy('created_at', 'desc')->get();
    }

    public function show($id)
    {
        return $this->model::find($id);
    }

    public function destroy($id)
    {
        $response = $this->model::find($id);
        $response->delete();
        return $response;
    }

    public function update(Request $request)
    {
        $id         = $request->id;
        $data       = $request->all();
        $response   = $this->model::find($id);
        $response   = $response->update($data);
        return $response;
    }

    public function store(Request $request)
    {
        $data       = $request->all();
        $this->validation($data)->validate();

        if(isset($data['password']))
            $data['password'] = Hash::make($data['password']);

        $response   = $this->model::create($data);
        return $response;
    }
}