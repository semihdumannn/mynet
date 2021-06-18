<?php


namespace App\Repository;


use Illuminate\Database\Eloquent\Collection;

interface AddressRepositoryInterface
{
    public function all(): Collection;
    public function store(array $data);
    public function update(int$id,array $data);
    public function delete(int $id);
    public function findById(int $id);
}
