<?php


namespace App\Repository;


use App\Models\Person;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface PersonRepositoryInterface
{
    public function all(): Collection;
    public function store(array $data);
    public function update(int$id,array $data);
    public function delete(int $id);
    public function findById(int $id);
    public function getAddressRelation(int $id):Collection;

}
