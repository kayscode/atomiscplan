<?php

namespace App\Http\Controllers;

use App\Repository\CareerPlanRepository;
use App\Repository\EmployeeCareerPlanRepository;
use App\Repository\EmployeeRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class CareerPlanController extends Controller
{
    private CareerPlanRepository $careerPlanRepository;
    private EmployeeRepository $employeeRepository;
    public function __construct(CareerPlanRepository $careerPlanRepository, EmployeeRepository $employeeRepository)
    {
        $this->careerPlanRepository = $careerPlanRepository;
        $this->employeeRepository = $employeeRepository;
    }

    public function dashboard(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $five_latest_career_plan = $this->careerPlanRepository->findLatestCreatedCareerPlan();
        return view("career-plan.main-dashboard",["career_plans"=>$five_latest_career_plan]);
    }

    public function list_careers_plan(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $careers_plan = $this->careerPlanRepository->findEmployeesCareerPlan();
        return view("career-plan.employees-career-plan-list",["careers_plan"=>$careers_plan]);
    }

    // list career plan for a specific year
    public function list_year_career_plan(int $year)
    {

    }

    // list employees with at least one career plan
    public function list_employees_with_career_plan(EmployeeCareerPlanRepository $employeeCareerPlanRepository): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $employees = $employeeCareerPlanRepository->getEmployeesWithCareerPlan();
        return view('career-plan.employees-with-career-plan',["employees"=>$employees]);
    }

    public function listEmployeeCareerPlan(int $employee_id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $employee = $this->employeeRepository->read($employee_id);
        $employeeCareerPlanList = $employee->careerPlans->sortBy('year',descending:true);
        return view('career-plan.employee-career-plan-list',["employee"=>$employee,"career_plans"=>$employeeCareerPlanList]);
    }

    public function  get_all_skills(int $employee_id): \Illuminate\Contracts\Foundation\Application|Factory|View|Application | array
    {
        $employee = $this->employeeRepository->read($employee_id);
        $employee_skills = $this->employeeRepository->allSkills($employee->id);
//        return  $employee_skills;
        return view('career-plan.employee-all-skills',["employee"=>$employee, "employee_skills"=>$employee_skills]);
    }

}
