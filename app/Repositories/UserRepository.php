<?php

namespace App\Repositories;
use App\Models\User;

class UserRepository {

    public function create($data){
        $info = [
            'name'        => $data['name'],
            'password'    => bcrypt($data['password']),
            'email'       => $data['email'],
            'status'      => $data['status']
        ];
       return (new User)->create($info);
    }
}
