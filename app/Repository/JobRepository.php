<?php

namespace App\Repository;

use App\Models\Job;
use Illuminate\Database\Eloquent\Collection;

class JobRepository implements CrudRepository
{
    // job model instance
    private Job $job;

    public function __construct(Job $job)
    {
        $this->job = $job;
    }

    /**
     * find an existing job base on the job code
     * @param string $jobCode
     * @return mixed
     */
    public function findJobByCode(string $jobCode): mixed
    {
        return $this->job::where("position_code",$jobCode)->first();
    }

    /**
     * @param array $data
     * @return void
     */
    public function create(array $data): void
    {
        $this->job::create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return void
     */
    public function update(int $id, array $data): void
    {
        $job = $this->job::find($id);
        $job->title = $data["title"];
        $job->position_code = $data["position_code"];
        $job->department = $data["department"];
        $job->hard_skills = $data["hard_skills"];
        $job->soft_skills = $data["soft_skills"];
        $job->save();
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $selected_job = $this->job::find($id);
        $selected_job->delete();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function read(int $id)
    {
        return $this->job::find($id);
    }

    public function findAll(): Collection
    {
        return $this->job::all(["id","title","position_code","year_of_experience","department"]);
    }

    public function findLastCreatedJobByLimit(int $number = 5): Collection
    {
        return $this->job::all(["title","position_code","year_of_experience","department","created_at"])->sortBy([["created_at","desc"]])->take($number);
    }

}
