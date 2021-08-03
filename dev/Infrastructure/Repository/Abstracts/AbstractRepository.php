<?php

namespace Dev\Infrastructure\Repository\Abstracts;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AbstractRepository base class for all repositories
 * @package Dev\Infrastructure\Repository\Abstracts
 */
abstract class AbstractRepository
{
    /**
     * @var Model $model instance model
     */
    protected $model;

    /**
     * AbstractRepository constructor.
     * @param Model $model instance model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function __call($method, $args)
    {
        return $this->model->{$method}(...$args);
    }
}