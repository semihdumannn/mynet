<?php


namespace App\Repository\Eloquent;


use App\Models\Person;

use App\Repository\PersonRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class PersonRepository extends BaseRepository implements PersonRepositoryInterface
{

    public function __construct(Person $model)
    {
        parent::__construct($model);
    }

    public function all(): Collection
    {
        return Cache::rememberForever($this->cachePrefix.'all',function (){
            return $this->model->all();
        });
    }

    public function store(array $data)
    {
        $person = $this->model::create($data);

        Cache::forever($this->cachePrefix.$person->id,$person);

        Cache::forget($this->cachePrefix.'all');
    }

    public function update(int $id,array $data)
    {
        $this->find($id)->update($data);

        Cache::forget($this->cachePrefix.$id);

        Cache::forget($this->cachePrefix.'all');
    }

    public function delete(int $id)
    {
        $this->find($id)->delete();

        Cache::forget($this->cachePrefix.$id);

        Cache::forget($this->cachePrefix.'all');
    }

    public function getAddressRelation(int $id):Collection
    {
        return $this->findById($id)->addresses;
    }

    public function findById(int $id)
    {
        return Cache::rememberForever($this->cachePrefix.$id,function () use($id){
           return $this->find($id);
        });
    }
}
