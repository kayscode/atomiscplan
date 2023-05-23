<?php

namespace App\Repository;

use App\Models\Employee;
use App\Models\Formation;
use App\Models\FormationParticipant;
use Illuminate\Database\Eloquent\Collection;

class FormationRepository implements CrudRepository
{
    private Formation $formation;
    private FormationParticipant $formationParticipant;

    public function __construct(Formation $formation, FormationParticipant $formationParticipant)
    {
        $this->formation = $formation;
        $this->formationParticipant = $formationParticipant;
    }

    public function create(array $data): void
    {
        $this->formation::create($data);
    }

    public function update(int $id, array $data): void
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
    }

    public function read(int $id)
    {
        return $this->formation::find($id);
    }

    public function findAll():Collection
    {
        return $this->formation::all();
    }

    public function fetchPublishedFormation(): Collection
    {
        return $this->formation::all()->where('is_published',true);
    }

    public function publish(int $id)
    {
        $formation = $this->read($id);
        $formation->is_published = true;
        $formation->save();
    }

    public function addParticipant(int $id, Employee $employee)
    {
        $formation = $this->read($id);
        $formation->addParticipant($employee);
    }

    public function confirmParticipation(int $formation_id, int $employee_id)
    {
        $formation = $this->read($formation_id);
        $formation_participant = $formation->participants()->where('employee_id',$employee_id)->first();
        $formation_participant->participate = true;
        $formation_participant->save();
    }

    public function findLastedFormation()
    {
        return $this->formation->all()->sortBy('end_date',descending:true)[0];
    }

}
