<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements CrudRepository
{
    private User $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function create(array $data): void
    {
        $this->user::create($data);
    }

    public function update(int $id, array $data): void
    {
        $user = $this->user::find($id);
        $user->employee_mat = $data["employee_mat"];
        $user->user_type = $data["user_type"];
        $user->password = $data["password"];
        $user->is_activated = $data["is_activated"];

        $user->save();
    }

    public function delete(int $id): void
    {
        $user = $this->user::find($id);
        $user->delete();
    }

    public function read(int $id)
    {
        return $this->user::find($id);
    }

    public function findAll(): Collection
    {
        return $this->user::all();
    }

    public function findAdminUsers()
    {
        return $this->user::where('user_type','hr_director')->orWhere('user_type','training_planner')->get();
    }
}
