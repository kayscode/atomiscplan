<?php

namespace App\Repository;

use App\Models\CareerPlanGoal;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Ramsey\Collection\Collection;

class EmployeeCareerPlanRepository implements CrudRepository
{
    private CareerPlanGoal $careerPlanGoal;
    private EmployeeRepository $employeeRepository;

    public function __construct(CareerPlanGoal $careerPlanGoal,EmployeeRepository $employeeRepository)
    {
        $this->careerPlanGoal = $careerPlanGoal;
        $this->employeeRepository = $employeeRepository;
    }

    public function create(array $data): void
    {
        $employee = $this->employeeRepository->findEmployeeByMat($data["employee_id"]);

        if(empty($employee))
        {
            throw new ModelNotFoundException("employee with ${$data['employee_id']} does not exist");
        }

        $data["employee_id"] = $employee->id;
        $this->careerPlanGoal::create($data);
    }

    public function update(int $id, array $data): void
    {
        $selectedCareerPlan = $this->careerPlanGoal::find($id);
        $selectedCareerPlan->goal_title = $data["goal_title"];
        $selectedCareerPlan->year = $data["year"];
        $selectedCareerPlan->description = $data["description"];

        $selectedCareerPlan->save();
    }

    public function delete(int $id): void
    {
        $selectedCareerPlan = $this->careerPlanGoal::find($id);
        $selectedCareerPlan->delete();
    }

    public function read(int $id)
    {
        return $this->careerPlanGoal::find($id);
    }
    public function getEmployeesWithCareerPlan(): \Illuminate\Database\Eloquent\Collection
    {
        $employees = $this->employeeRepository->findAll();
        $employeeWithCareerPlan = new \Illuminate\Database\Eloquent\Collection();

        foreach ($employees as $employee)
        {
            if(sizeof($employee->careerPlans))
            {
                $employeeWithCareerPlan->add($employee);
            }
        }
        return $employeeWithCareerPlan;
    }
}
