<?php
namespace App\Repository\Eloquent;

use App\Models\Address;
use App\Repository\AddressRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class AddressRepository extends BaseRepository implements AddressRepositoryInterface
{
    public function __construct(Address $model)
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

    public function findById(int $id)
    {
        return Cache::rememberForever($this->cachePrefix.$id,function () use($id){
            return $this->find($id);
        });
    }
}
