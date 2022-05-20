<?php


namespace App\Http\Repositories;


use App\Models\EmployeeAttendance;

class EmployeeAttendanceRepository extends Repository
{
    /**
     * UserRepository constructor.
     */
    public function __construct ()
    {
        parent::__construct( new EmployeeAttendance());
    }
}
