<?php

namespace App\Repositories;
use App\User;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends CrudRepository{
    
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function data($request)
    {
        $data = [
            'name' => $request->nama,
            'email' => $request->email,
            'password' => $request->password
        ];
        return $data;
    }
}