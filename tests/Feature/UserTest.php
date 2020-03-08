<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\UserRepository;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    public function test_create_user(){
        $data = [
            'name'      => 'João Morais Figueiredo',
            'email'     => 'joao@email.com',
            'password'  => '123456'
        ];

        $user = (new UserRepository)->create($data);
        $this->assertDatabaseHas('users', ['name' => 'João Morais Figueiredo']);

    }
}
