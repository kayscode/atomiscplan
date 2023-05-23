<?php

namespace App\Http\Controllers;

use App\Repository\EmployeeCareerPlanRepository;
use App\Repository\EmployeeRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeCareerPlanController extends Controller
{

    private EmployeeRepository $employeeRepository;
    private EmployeeCareerPlanRepository $employeeCareerPlanRepository;

    public function __construct(EmployeeRepository $employeeRepository, EmployeeCareerPlanRepository $employeeCareerPlanRepository)
    {
        $this->employeeRepository = $employeeRepository;
        $this->employeeCareerPlanRepository = $employeeCareerPlanRepository;
    }
    /**
     * Display a listing of the resource employee career plans
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        // get employee from authenticate user
        $employee = Auth::user()->employee;

        // retrieve all careers plan belong to that employee
        $careerPlans = $employee->careerPlans;

        return view('employee.employee-career-plans',["career_plans"=>$careerPlans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("career-plan.create-career-plan");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
           "employee_id"=>"required",
           "goal_title" => "required",
           "year" => "required",
           "description"=>"nullable"
        ]);

        try {
            $this->employeeCareerPlanRepository->create($validatedData);
        }catch (ModelNotFoundException $exception){
            return "not found";
        }

        return back();
    }

//    /**
//     * Display the specified resource.
//     */
//    public function show(int $employee_id, int $career_plan_id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
//    {
//        $employee = $this->employeeRepository->read($employee_id);
//        $career_plan = $employee->careerPlans->where('id',$career_plan_id)->first();;
//        $career_plan_skills = $career_plan->skills;
//
//        return view('career-plan.employee-career-plan-detail',["employee" => $employee,"career_plan"=>$career_plan,"career_plan_skills"=>$career_plan_skills]);
//    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, int $employee_id, int $career_plan_id): RedirectResponse
    {
        $validated = $request->validate([
           "career_plan_id" => "required"
        ]);

        $this->employeeCareerPlanRepository->delete($validated["career_plan_id"]);

        return redirect()->route('employee_career_plan_list',["employee_id"=>$employee_id]);
    }
}
