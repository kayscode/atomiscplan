<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillPostRequest;
use App\Repository\CareerPlanRepository;
use App\Repository\EmployeeCareerPlanRepository;
use App\Repository\EmployeeCareerPlanSkillRepository;
use App\Repository\EmployeeRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmployeeCareerPlanSkillController extends Controller
{
    private EmployeeRepository $employeeRepository;
    private EmployeeCareerPlanSkillRepository $employeeCareerPlanSkillRepository;

    public function __construct(EmployeeRepository $employeeRepository, EmployeeCareerPlanSkillRepository $employeeCareerPlanSkillRepository)
    {
        $this->employeeRepository = $employeeRepository;
        $this->employeeCareerPlanSkillRepository = $employeeCareerPlanSkillRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(int $employee_id, int $career_plan_id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $employee = $this->employeeRepository->read($employee_id);
        $career_plan = $employee->careerPlans->where('id',$career_plan_id)->first();;
        $career_plan_skills = $career_plan->skills;

        return view('career-plan.employee-career-plan-detail',["employee" => $employee,"career_plan"=>$career_plan,"career_plan_skills"=>$career_plan_skills]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $employee_id, int $career_plan_id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view("career-plan.add-skill-career-plan",["career_plan_id"=>$career_plan_id,"employee_id"=>$employee_id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SkillPostRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData["state"] = !($validatedData["state"] == "0");
        $validatedData["career_goal_id"] = (int)$validatedData["career_plan_id"];
//        return $validatedData;

        $this->employeeCareerPlanSkillRepository->create($validatedData);
        return back();
    }

    /**
     * Display skill details
     */
    public function show(int $employee_id, int $career_plan_id ,int $skill_id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $skill = $this->employeeCareerPlanSkillRepository->read($skill_id);
        $career_plan = $skill->careerPlan;
        return view('career-plan.career-plan-skill-detail',['skill'=>$skill,'career_plan'=> $career_plan]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $employee_id, int $career_plan_id, int $skill_id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $skill = $this->employeeCareerPlanSkillRepository->read($skill_id);
        return view('career-plan.edit-skill-career-plan',['skill'=>$skill,"employee_id"=>$employee_id, "career_plan_id"=>$career_plan_id,"skill_id"=>$skill_id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SkillPostRequest $request, int $employee_id, int $career_plan_id, int $skill_id)
    {
        $validatedData = $request->validated();
        $validatedData["state"] = !($validatedData["state"] == "0");
        $validatedData["career_goal_id"] = (int)$validatedData["career_plan_id"];
//        return $validatedData;

        $this->employeeCareerPlanSkillRepository->update($skill_id,$validatedData);
        return redirect()->route("show_skill",["employee_id"=>$employee_id,"career_plan_id"=>$career_plan_id,"skill_id"=>$skill_id]);
    }

    /**
     * master skill
    */
    public function masterSkill(Request $request, int $employee_id, int $career_plan_id, int $skill_id): RedirectResponse
    {
        $validated = $request->validate([
            "skill_id"=>"required"
        ]);

        $skill = $this->employeeCareerPlanSkillRepository->read($validated["skill_id"]);
        $skill->state = true;
        $skill->save();

        return redirect()->route("show_skill",["employee_id"=>$employee_id,"career_plan_id"=>$career_plan_id,"skill_id"=>$skill_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,int $employee_id, int $career_plan_id, int $skill_id)
    {
        $validated = $request->validate([
            "skill_id"=>"required"
        ]);

        $this->employeeCareerPlanSkillRepository->delete($validated["skill_id"]);

        return redirect()->route("index_skills",["employee_id"=>$employee_id,"career_plan_id"=>$career_plan_id]);
    }
}
