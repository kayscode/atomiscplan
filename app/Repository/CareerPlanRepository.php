<?php

namespace App\Repository;
use App\Models\CareerPlanGoal;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Collection;

class CareerPlanRepository
{
    // instance of career plan
    private CareerPlanGoal $careerPlan;
    private Employee $employee;
    public function __construct(CareerPlanGoal $careerPlan, Employee $employee)
    {
        $this->careerPlan = $careerPlan;
        $this->employee = $employee;
    }

    /**
     * get all career plan for a specific employee
     *
     * @param int $employeeId
     * @return mixed
     */
    public function findAllEmployeeCareerPlan(int $employeeId): mixed
    {
        return $this->careerPlan::where("id","=",$employeeId)->get();
    }

    /**
     * get all employees career plan by year
    */
    public function findAllCareerPlanByYear(int $year)
    {
        return $this->careerPlan::where("year","=",$year)->get();
    }

    /**
     *  get latest created employees career plan
     *
     * @param int $limit
     * @return Collection
    */
    public function findLatestCreatedCareerPlan(int $limit=5): Collection
    {
        return $this->careerPlan::all()->sortByDesc("created_at")->take(3);
    }

    /**
     * find employees career plan
    */
    public function findEmployeesCareerPlan(): Collection
    {
        return $this->careerPlan::all()->sortBy("created_at",descending: true);
    }
}
