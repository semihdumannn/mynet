<?php


namespace App\Repository\Eloquent;


use App\Repository\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class BaseRepository implements EloquentRepositoryInterface
{
    protected $model;

    protected $cachePrefix ;

    public function __construct(Model $model)
    {
        $this->model = $model;

        $this->cachePrefix = Str::slug(class_basename($this->model)).'.';
    }

    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }
}
