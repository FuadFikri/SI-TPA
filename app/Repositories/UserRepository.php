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
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ];
        return $data;
    }
}