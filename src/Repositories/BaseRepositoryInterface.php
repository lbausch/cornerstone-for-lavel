<?php

namespace Bausch\LaravelCornerstone\Repositories;

interface BaseRepositoryInterface
{
    /**
     * Find a Model by ID.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function findById($id);

    /**
     * Find many by IDs.
     *
     * @param Collection $ids
     */
    public function findManyByIds(array $ids);

    /**
     * Paginate.
     *
     * @param type $limit
     */
    public function paginate($limit = null);

    /**
     * Get instance of Model.
     *
     * @param array $data
     *
     * @return mixed
     */
    public function instance(array $data = []);

    /**
     * Fill Model.
     *
     * @param Model $model
     * @param array $data
     */
    public function fill(&$model, array $data = []);

    /**
     * Destroy Model.
     *
     * @param Model $model
     *
     * @return bool
     */
    public function destroy($model);

    /**
     * Store Model.
     *
     * @param Model $model
     *
     * @return Model
     */
    public function store(&$model);

    /**
     * Update Model.
     *
     * @param Model $model
     */
    public function update(&$model);
}
