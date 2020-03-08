<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\UserRepository;
use App\Repositories\EmployeeRepository;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    public function test_create_user(){
        $data = [
            'name'      => 'João Morais Figueiredo',
            'email'     => 'joao@email.com',
            'password'  => '123456',
            'status'    => 'admin'
        ];

        $user = (new UserRepository)->create($data);
        $this->assertDatabaseHas('users', ['name' => 'João Morais Figueiredo']);
    }

    public function teste_create_employee(){
        $data = [
            'name'      => 'Maria Oliveira Santos',
            'email'     => 'maria@email.com',
            'password'  => '123456',
            'status'    => 'employee'
        ];
        $user     = (new UserRepository)->create($data);

        $employee_data = [
            'user_id'  => $user->id,
            'office'   => 'manager',
            'salary'   => 2000
        ];

        $employee = (new EmployeeRepository)->create($employee_data);
        $this->assertDatabaseHas('users', ['name' => 'Maria Oliveira Santos']);
        $this->assertDatabaseHas('employees', ['user_id' => $user->id]);
    }

    public function teste_get_profile_employee(){
        $data = [
            'name'      => 'Maria Oliveira Santos',
            'email'     => 'maria@email.com',
            'password'  => '123456',
            'status'    => 'employee'
        ];
        $user     = (new UserRepository)->create($data);

        $employee_data = [
            'user_id'  => $user->id,
            'office'   => 'manager',
            'salary'   => 2000
        ];

        $employee = (new EmployeeRepository)->create($employee_data);

        $result   = $user->employee;
        $this->assertEquals($employee, $result);
    }
}
