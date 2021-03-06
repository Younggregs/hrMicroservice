<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Employee;
use App\Payroll;

use App\Repositories\Paycheck\PaycheckContract;
use App\Repositories\PaycheckComponent\PaycheckComponentContract;
use App\Repositories\PaycheckSummary\PaycheckSummaryContract;
use Illuminate\Support\Facades\Log;

class PayEmployee implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;
    
    protected $employee;
    protected $payroll;
    protected $paycheckModel;
    protected $paycheckComponentModel;
    protected $paycheckSummarymodel;
    
    protected $consolidatedSalary;
    protected $consolidatedAllowance;
    protected $grossTotal;
    
    protected $totalDeductions;
    protected $totalEarnings;
    protected $netPay;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Employee $employee, Payroll $payroll)
    {
        //
        $this->employee = $employee;
        $this->payroll = $payroll;
    }

    /**
     * Execute the job.
     * @param  PaycheckContract  $paycheckContract
     * @param  PaycheckComponentContract  $paycheckComponentContract
     * @param  PaycheckSummaryContract  $paycheckSummaryContract
     * @return void
     */
    public function handle(  $paycheckContract, 
          $paycheckComponentContract,
          $paycheckSummaryContract)
    {
        //
        $this->paycheckModel = $paycheckContract;
        $this->paycheckComponentModel = $paycheckComponentContract;
        $this->paycheckSummarymodel = $paycheckSummaryContract;
        $this->populate_paycheck();
        $this->populate_paycheck_components();
        $this->populate_paycheck_summary();
    }
    
    private function populate_paycheck(){
        Log::info("Creating Paycheck for.." . $this->employee->id);
        $paygrade = $this->employee->employee_paygrade ? $this->employee->employee_paygrade->paygrade->amount : 0;
        $paygradeAllowance = $this->employee->employee_paygrade ? $this->employee->employee_paygrade->paygrade->allowance : 0;
        $this->consolidatedSalary = ($this->employee->employee_basic_salary->amount + $paygrade);
        $this->consolidatedAllowance = ($this->employee->employee_basic_salary->allowance + $paygradeAllowance);
        $this->grossTotal = ($this->consolidatedSalary / 12) + $this->consolidatedAllowance;
        $paycheck = new \App\Paycheck;
        $paycheck->employee_id = $this->employee->id;
        $paycheck->cycle = $this->payroll->cycle;
        $paycheck->employee_prefix = $this->employee->prefix->title;
        $paycheck->employee_surname = $this->employee->surname;
        $paycheck->employee_othernames = $this->employee->other_names;
        $paycheck->employee_number = $this->employee->employee_number;
        $paycheck->employee_type = $this->employee->employee_type->title;
        $paycheck->payroll_id = $this->payroll->id;
        $paycheck->consolidated_salary = $this->consolidatedSalary;
        $paycheck->consolidated_allowance = $this->consolidatedAllowance;
        $paycheck->department = $this->employee->employee_department ? $this->employee->employee_department->department->title : '';
        $paycheck->save();
        Log::info('created with id' . $paycheck->id . ', payroll_id: '. $this->payroll->id);
    }
    
    private function populate_paycheck_components(){
        $this->totalDeductions = 0;
        $this->totalEarnings = 0;
        if(count($this->employee->employee_salary_components) > 0){
            foreach($this->employee->employee_salary_components as $employee_salary_component_info){
                $amount = 0;
                if($employee_salary_component_info->salary_component->component_type == 'Earning'){
                    if($employee_salary_component_info->salary_component->value_type == 'Amount'){
                        $this->totalEarnings += $employee_salary_component_info->amount;
                        $amount = $employee_salary_component_info->amount;
                    }else{
                        $this->totalEarnings += ($this->consolidatedSalary / 12) * ($employee_salary_component_info->amount / 100);
                        $amount = ($this->consolidatedSalary / 12) * ($employee_salary_component_info->amount / 100);
                    }
                }else{
                    if($employee_salary_component_info->salary_component->value_type == 'Amount'){
                        $this->totalDeductions += $employee_salary_component_info->amount;
                        $amount = $employee_salary_component_info->amount;
                    }else{
                        $this->totalDeductions += ($this->consolidatedSalary / 12) * ($employee_salary_component_info->amount / 100);
                        $amount = ($this->consolidatedSalary / 12) * ($employee_salary_component_info->amount / 100);
                    }
                    if($employee_salary_component_info->salary_component->permanent_title == 'pension'){
                        $this->totalDeductions += $this->employee->employee_pension ? $this->employee->employee_pension->voluntary_contribution : 0;
                        //$amount is ignored for pension to reapper again in employee's payslip
                    }
                }
                $paycheckComponent = $this->paycheckComponentModel->getInstance();
                $paycheckComponent->employee_id = $this->employee->id;
                $paycheckComponent->employee_prefix = $this->employee->prefix->title;
                $paycheckComponent->employee_surname = $this->employee->surname;
                $paycheckComponent->employee_othernames = $this->employee->other_names;
                $paycheckComponent->employee_number = $this->employee->employee_number;
                $paycheckComponent->employee_type = $this->employee->employee_type->title;
                $paycheckComponent->payroll_id = $this->payroll->id;
                $paycheckComponent->component_title = $employee_salary_component_info->salary_component->title;
                $paycheckComponent->component_permanent_title = $employee_salary_component_info->salary_component->permanent_title;
                $paycheckComponent->component_id = $employee_salary_component_info->salary_component->id;
                $paycheckComponent->amount = $amount;
                $paycheckComponent->component_type = $employee_salary_component_info->salary_component->component_type;
                $paycheckComponent->cycle = $this->payroll->cycle;
                $paycheckComponent->rank = $this->employee->employee_rank ? $this->employee->employee_rank->rank->title : '';
                $paycheckComponent->level = $this->employee->employee_paygrade ? $this->employee->employee_paygrade->paygrade->employee_level->title : '';
                $paycheckComponent->step = $this->employee->employee_paygrade ? $this->employee->employee_paygrade->paygrade->title : '';
                $paycheckComponent->department = $this->employee->employee_department ? $this->employee->employee_department->department->title : '';
                if(!$paycheckComponent->save()){
                    throw new \Exception("Error Creating paycheck component for employee " . $this->employee->surname);
                }
            }
        }
    }
    
    private function populate_paycheck_summary(){
        $paycheckSummary = $this->paycheckSummarymodel->getInstance();
        $paycheckSummary->employee_id = $this->employee->id;
        $paycheckSummary->employee_prefix = $this->employee->prefix->title;
        $paycheckSummary->employee_surname = $this->employee->surname;
        $paycheckSummary->employee_othernames = $this->employee->other_names;
        $paycheckSummary->employee_number = $this->employee->employee_number;
        $paycheckSummary->employee_type = $this->employee->employee_type->title;
        $paycheckSummary->payroll_id = $this->payroll->id;
        $paycheckSummary->rank = $this->employee->employee_rank ? $this->employee->employee_rank->rank->title : '';
        $paycheckSummary->level = $this->employee->employee_paygrade ? $this->employee->employee_paygrade->paygrade->employee_level->title : '';
        $paycheckSummary->step = $this->employee->employee_paygrade ? $this->employee->employee_paygrade->paygrade->title : '';
        $paycheckSummary->basic_salary = $this->employee->employee_basic_salary->amount;
        $paycheckSummary->allowance = $this->employee->employee_basic_salary->allowance;
        $paycheckSummary->paygrade_amount = $this->employee->employee_paygrade ? $this->employee->employee_paygrade->paygrade->amount : 0;
        $paycheckSummary->paygrade_allowance = $this->employee->employee_paygrade ? $this->employee->employee_paygrade->paygrade->allowance : 0;
        $paycheckSummary->consolidated_salary = $this->consolidatedSalary;
        $paycheckSummary->consolidated_allowance = $this->consolidatedAllowance;
        $paycheckSummary->gross_total = $this->grossTotal;
        $paycheckSummary->total_deductions = $this->totalDeductions;
        $paycheckSummary->total_earnings = $this->totalEarnings;
        $paycheckSummary->net_pay = $this->grossTotal + $this->totalEarnings - $this->totalDeductions;
        $paycheckSummary->cycle = $this->payroll->cycle; 
        $paycheckSummary->department = $this->employee->employee_department ? $this->employee->employee_department->department->title : '';
        
        $pensionAmount = 0;
        if(count($this->employee->employee_salary_components) > 0){
            foreach($this->employee->employee_salary_components as $employee_salary_component_info){
                if($employee_salary_component_info->salary_component->permanent_title != "pension") continue;
                if($employee_salary_component_info->salary_component->value_type == 'Amount'){
                    $pensionAmount = $employee_salary_component_info->amount;
                }else{
                    $pensionAmount = ($this->consolidatedSalary / 12) * ($employee_salary_component_info->amount / 100);
                }
                $paycheckSummary->pension_amount = $pensionAmount;
                $paycheckSummary->pension_employer_contribution_amount = $this->employee->employee_pension ? ($this->employee->employee_pension->employer_contribution / 100) * ($this->consolidatedSalary / 12) : 0;
                $paycheckSummary->pension_voluntary_contribution_amount = $this->employee->employee_pension ? $this->employee->employee_pension->voluntary_contribution : 0;
                $paycheckSummary->pension_pin_number = $this->employee->employee_pension ? $this->employee->employee_pension->pin_number : '';
                $paycheckSummary->pension_company = $this->employee->employee_pension ? $this->employee->employee_pension->pension->title : '';
                $paycheckSummary->pensionable = $this->employee->employee_pension ? true : false;
                $paycheckSummary->pension_id = $this->employee->employee_pension ? $this->employee->employee_pension->pension_id : 0;
            }
        }
        
        $taxAmount = 0;
        if(count($this->employee->employee_salary_components) > 0){
            foreach($this->employee->employee_salary_components as $employee_salary_component_info){
                if($employee_salary_component_info->salary_component->permanent_title != "tax") continue;
                if($employee_salary_component_info->salary_component->value_type == 'Amount'){
                    $taxAmount = $employee_salary_component_info->amount;
                }else{
                    $taxAmount = ($this->consolidatedSalary / 12) * ($employee_salary_component_info->amount / 100);
                }
                $paycheckSummary->tax_amount = $taxAmount;
                $paycheckSummary->taxable = true;
                $paycheckSummary->tax_id = $employee_salary_component_info->salary_component->id;
            }
        }
        
        if($this->employee->employee_bank && $this->employee->employee_bank->bank && $this->employee->employee_bank->bank->title){
            $paycheckSummary->bank = $this->employee->employee_bank->bank->title;
            $paycheckSummary->bankable = true;
            $paycheckSummary->bank_id = $this->employee->employee_bank->bank->id;
            $paycheckSummary->bank_account_name = $this->employee->employee_bank->account_name;
            $paycheckSummary->bank_account_number = $this->employee->employee_bank->account_number;
            $paycheckSummary->bank_sort_code = $this->employee->employee_bank->sort_code;
        }
        
        if(!$paycheckSummary->save()){
            throw new \Exception("Error Creating paycheck summary for employee " . $this->employee->surname);
        }
    }
}
