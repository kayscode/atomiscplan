<?php

namespace App\Repository;

use App\Models\Skill;

class EmployeeCareerPlanSkillRepository implements CrudRepository
{
    private Skill $careerPlanSkill;
    public function __construct(Skill $careerPlanSkill){
        $this->careerPlanSkill = $careerPlanSkill;
    }

    /**
     * add new skill to career plan
     *
     * @param array $data
     * @return void
    */
    public function create(array $data): void
    {
        $this->careerPlanSkill::create($data);
    }

    public function update(int $id, array $data): void
    {
        $selectedCareerPlanSkill = $this->careerPlanSkill::find($id);
        $selectedCareerPlanSkill->name = $data["name"];
        # type
        $selectedCareerPlanSkill->state = $data["state"];

        # type of skill type
        $selectedCareerPlanSkill->skill_type = $data["skill_type"];

        # type of way of accessing skill
        $selectedCareerPlanSkill->skill_access_by = $data["skill_access_by"];

        # career goal plan id
        $selectedCareerPlanSkill->career_goal_id = $data["career_plan_id"];

        # actions plan
        $selectedCareerPlanSkill->actions_plan = $data["actions_plan"];

        $selectedCareerPlanSkill->save();
    }

    /**
     * delete skill from career plan
    */
    public function delete(int $id): void
    {
        $selectedCareerPlanSkill = $this->careerPlanSkill::find($id);
        $selectedCareerPlanSkill->delete();
    }

    // get one career plan skill
    public function read(int $id)
    {
        return $this->careerPlanSkill::find($id);
    }
}
