<?php

namespace App\Repositories;
use App\User;

class UserRepository {

    public function create($data){
        $info = [
            'name'        => $data['name'],
            'password'    => bcrypt($data['password']),
            'email'       => $data['email']
        ];
        $create = (new User)->create($info);
    }
}
