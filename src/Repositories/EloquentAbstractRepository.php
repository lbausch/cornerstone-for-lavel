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
     * @return Model
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
     * @return Collection
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
     * @return type
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
     * @param Model $model
     * @param array $data
     */
    public function fill(&$model, array $data = array())
    {
        $model->fill($data);
    }

    /**
     * Destroy Model.
     *
     * @param Model $model
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
     * @param Model $model
     *
     * @return Model
     */
    public function store(&$model)
    {
        $model->save();

        return $model;
    }

    /**
     * Update Model.
     *
     * @param Model $model
     *
     * @return Model
     */
    public function update(&$model)
    {
        $this->store($model);

        return $model;
    }
}
