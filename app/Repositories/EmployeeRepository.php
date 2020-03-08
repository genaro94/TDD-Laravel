<?php

namespace App\Repositories;

use App\Models\Employee;

class EmployeeRepository {

    public function create($data){
        $info = [
            'user_id'        => $data['user_id'],
            'office'         => $data['office'],
            'salary'         => $data['salary']
        ];
        $employee = (new Employee)->create($info);
        return (new Employee)->find($employee->id);
    }
}
