<?php

namespace App\Repositories\SalaryComponent;

use App\SalaryComponent;
use App\Repositories\SalaryComponent\SalaryComponentContract;

class EloquentSalaryComponentRepository implements SalaryComponentContract
{
    public function create($request) {
        $salaryComponent = new SalaryComponent;

        // Set the SalaryComponent properties
        $this->setSalaryComponentProperties($salaryComponent, $request);

        $salaryComponent->save();
        return $salaryComponent;
    }

    public function edit($salaryComponentId, $request) {
        $salaryComponent = $this->findById($salaryComponentId);

        // Edit the SalaryComponent properties
        $this->setSalaryComponentProperties($salaryComponent, $request);

        $salaryComponent->save();
        return $salaryComponent;
    }

    public function findAll() {
        return SalaryComponent::all();
    }

    public function findById($salaryComponentId) {
        return SalaryComponent::find($salaryComponentId);
    }

    public function remove($salaryComponentId) {
        $salaryComponent = $this->findById($salaryComponentId);
        return $salaryComponent->delete();
    }

    private function setSalaryComponentProperties($salaryComponent, $request) {
        // Assign attributes to the salaryComponent here
        $salaryComponent->title = $request->title;
        $salaryComponent->component_type = $request->component_type;
        $salaryComponent->value_type = $request->value_type;
        if($request->value_type == "Percentage"){
            $salaryComponent->amount = 0.0;
            $salaryComponent->percentage = $request->amount;
        }else{
            $salaryComponent->amount = $request->amount;
            $salaryComponent->percentage = 0.0;
        }
    }
}