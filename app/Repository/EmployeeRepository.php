<?php

namespace App\Repository;
use App\Models\Employee;
use App\Models\FormationParticipant;
use Illuminate\Database\Eloquent\Collection;

class EmployeeRepository implements CrudRepository
{
    // table
    private Employee $employee;
    private FormationParticipant $formationParticipant;

    public function __construct(Employee $employee, FormationParticipant $formationParticipant)
    {
        $this->employee = $employee;
        $this->formationParticipant = $formationParticipant;
    }

    // find employee by his mat code
    public function findEmployeeByMat(string $employeeMat): Employee
    {
        return $this->employee::where('employee_mat',$employeeMat)->first();
    }

    // find employee by id
    public function findEmployeeById(int $id)
    {
        return Employee::find($id);
    }

    // find all employee

    public function findAll(): Collection
    {
        return $this->employee::all();
    }

    /**
     * @param array $data
     * @return void
     */
    public function create(array $data): void
    {
        $this->employee::create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return void
     */
    public function update(int $id, array $data): void
    {
        $employee = $this->employee::find($id);
        $employee->hard_skills = $data["hard_skills"];
        $employee->soft_skills = $data["soft_skills"];
        $employee->ambitions = $data["ambitions"];
        $employee->first_name = $data["first_name"];
        $employee->last_name= $data["last_name"];
        $employee->middle_name= $data["middle_name"];
        $employee->employee_mat = $data["employee_mat"];
        $employee->profile_picture= $data["profile_picture"];
        $employee->job_id = $data["job_id"];
        $employee->save();
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $employee = $this->employee::findOr($id);
        if($employee){
            $employee->delete();
        }
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function read(int $id): mixed
    {
        return $this->employee::find($id);
    }

    public function allSkills(int $employee_id): array
    {
        $all_skills = [];
        $employee = $this->read($employee_id);

        // get initial skill
        $all_skills["initial_skills"] = [];
        $all_skills["initial_skills"]["soft_skills"] = $employee->soft_skills;
        $all_skills["initial_skills"]["hard_skills"] = $employee->hard_skills;

        // retrieve all skills from career plan
        $career_plans = $employee->careerPlans;
        if(!empty($career_plans))
        {
            $all_skills["career_plans"] = [];
            $career_plans_hard_skills = [];
            $career_plans_soft_skills = [];
            foreach ($career_plans as $career_plan)
            {
                $hard_skills = $career_plan->skills->where('skill_type','hard_skill')->where('state',true)->all(['name']);
                if(!empty($hard_skills))
                {
                    foreach ($hard_skills as $hard_skill)
                    {
                        $career_plans_hard_skills[] = $hard_skill->name;
                    }
                }

                $soft_skills = $career_plan->skills->where('skill_type','soft_skill')->where('state',true)->all(['name']);
                if(!empty($soft_skills))
                {
                    foreach ($soft_skills as $soft_skill)
                    {
                        $career_plans_hard_skills[] = $soft_skill->name;
                    }
                }
            }
            $all_skills["career_plans"]["soft_skills"] = $career_plans_soft_skills;
            $all_skills["career_plans"]["hard_skills"] = $career_plans_hard_skills;

        }

        // retrieve formations skills

        $employee_formations = $this->formationParticipant->where('employee_id',$employee->id)->where('participate',true)->get();

        $employee_formations_skills = [];
        $employee_formations_skills["soft_skills"] = [];
        $employee_formations_skills["hard_skills"] = [];

        if(!empty($employee_formations))
        {
            foreach ($employee_formations as $employee_formation){
                $formation_soft_skill = $employee_formation->formation->soft_skills;
                if(!empty($formation_soft_skill))
                {
                    $employee_formations_skills["soft_skills"][] =$formation_soft_skill;
                }

                $formation_hard_skill = $employee_formation->formation->hard_skills;
                if(!empty($formation_hard_skill))
                {
                    $employee_formations_skills["hard_skills"][] = $formation_hard_skill;
                }
            }
        }

        $all_skills["formations"] = $employee_formations_skills;


        return $all_skills;
    }
}
