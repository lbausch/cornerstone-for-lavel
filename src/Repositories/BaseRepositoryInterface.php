<?php

namespace Bausch\LaravelCornerstone\Repositories;

interface BaseRepositoryInterface
{

    /**
     * find a Model by ID
     * 
     * @param int $id
     * @return mixed
     */
    public function findById($id);

    /**
     * find many by IDs
     * 
     * @param Collection $ids
     */
    public function findManyByIds(array $ids);

    /**
     * paginate
     * 
     * @param type $limit
     */
    public function paginate($limit = null);

    /**
     * get instance of Model
     * 
     * @param array $data
     * @return mixed
     */
    public function instance(array $data = []);

    /**
     * fill Model
     * 
     * @param Model $model
     * @param array $data
     */
    public function fill(&$model, array $data = []);

    /**
     * destroy Model
     * 
     * @param Model $model
     * @return bool
     */
    public function destroy($model);

    /**
     * store Model
     * 
     * @param Model $model
     * @return Model
     */
    public function store(&$model);

    /**
     * update Model
     * 
     * @param Model $model
     */
    public function update(&$model);
}
