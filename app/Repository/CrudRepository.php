<?php

namespace App\Repository;

interface CrudRepository
{
    public function create(array $data): void;
    public function update(int $id, array $data):void;
    public function delete(int $id):void;
    public function read(int $id);
}
