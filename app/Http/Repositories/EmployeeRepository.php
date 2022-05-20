<?php


namespace App\Http\Repositories;


use App\Models\Employee;

class EmployeeRepository extends Repository
{
    /**
     * UserRepository constructor.
     */
    public function __construct ()
    {
        parent::__construct( new Employee());
    }
}
