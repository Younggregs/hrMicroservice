<?php

namespace App\Repositories\Employee;

use App\Employee;
use App\Repositories\Employee\EmployeeContract;
use App\Events\EmployeeCreated;

class EloquentEmployeeRepository implements EmployeeContract
{
    public function create($request) {
        $employee = new Employee;

        // Set the Employee properties
        $this->setEmployeeProperties($employee, $request);

        $employee->save();
        event(new EmployeeCreated($employee->toArray()));
        return $employee;
    }

    public function edit($employeeId, $request) {
        $employee = $this->findById($employeeId);

        // Edit the Employee properties
        $this->setEmployeeProperties($employee, $request);

        $employee->save();
        return $employee;
    }

    public function findAll() {
        return Employee::with('employee_department')
        ->get();
    }

    public function findById($employeeId) {
        return Employee::find($employeeId);
    }

    public function remove($employeeId) {
        $employee = $this->findById($employeeId);
        return $employee->delete();
    }

    private function setEmployeeProperties($employee, $request) {
        // Assign attributes to the employee here
        $employee->surname = $request->surname;
        $employee->other_names = $request->other_names;
        $employee->employee_number = $request->employee_number;
        $employee->dob = $request->dob;
        $employee->prefix_id = $request->prefix;
        $employee->employee_type_id = $request->employee_type;
        $employee->gender = $request->gender;
        $employee->email = $request->email;
        $employee->address = $request->address;
        $employee->logical_address = $request->logical_address;
        $employee->mobile_work = $request->mobile_work;
        $employee->mobile_home = $request->mobile_home;
    }
}
