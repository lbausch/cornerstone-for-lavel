<?php

namespace Bausch\LaravelCornerstone\Repositories;

abstract class EloquentAbstractRepository implements BaseRepositoryInterface
{
    /**
     * Model.
     *
     * @var mixed
     */
    protected $model;

    /**
     * Find by ID.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function findById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Find many by IDs.
     *
     * @param array $ids
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findManyByIds(array $ids)
    {
        $models = $this->model->whereIn($this->model->getKeyName(), array_unique($ids))
            ->get();

        return $models;
    }

    /**
     * Paginate.
     *
     * @param int $limit
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function paginate($limit = null)
    {
        return $this->model->paginate($limit);
    }

    /**
     * New instance.
     *
     * @param array $data
     *
     * @return Model
     */
    public function instance(array $data = [])
    {
        return new $this->model($data);
    }

    /**
     * Fill Model.
     *
     * @param mixed $model
     * @param array $data
     */
    public function fill($model, array $data = [])
    {
        $model->fill($data);
    }

    /**
     * Destroy Model.
     *
     * @param mixed $model
     *
     * @return bool
     */
    public function destroy($model)
    {
        return $model->delete();
    }

    /**
     * Store Model.
     *
     * @param mixed $model
     *
     * @return mixed
     */
    public function store($model)
    {
        $model->save();

        return $model;
    }

    /**
     * Update Model.
     *
     * @param mixed $model
     *
     * @return mixed
     */
    public function update($model)
    {
        $this->store($model);

        return $model;
    }
}
