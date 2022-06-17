<?php


namespace BlueFeather\EloquentFileMaker\Database\Query;

use Closure;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class FMODataBuilder extends Builder
{

    /**
     * The base query builder instance.
     *
     * @var \Illuminate\Database\Query\Builder
     */
    protected $query;

    /**
     * The model being queried.
     *
     * @var Model
     */
    protected $model;


    /**
     * Add a where clause on the primary key to the query.
     *
     * @param  mixed  $id
     * @return $this
     */
    public function whereKey($id)
    {
        if ($id instanceof Model) {
            $id = $id->getKey();
        }

        if (is_array($id) || $id instanceof Arrayable) {
            $this->query->whereIn($this->model->getQualifiedKeyName(), $id);

            return $this;
        }

        if ($id !== null && $this->model->getKeyType() === 'string') {
            $id = (string) $id;
        }

        return $this->where($this->model->getQualifiedKeyName(), 'eq', $id);
    }

    /**
     * Add a where clause on the primary key to the query.
     *
     * @param  mixed  $id
     * @return $this
     */
    public function whereKeyNot($id)
    {
        if ($id instanceof Model) {
            $id = $id->getKey();
        }

        if (is_array($id) || $id instanceof Arrayable) {
            $this->query->whereNotIn($this->model->getQualifiedKeyName(), $id);

            return $this;
        }

        if ($id !== null && $this->model->getKeyType() === 'string') {
            $id = (string) $id;
        }

        return $this->where($this->model->getQualifiedKeyName(), 'ne', $id);
    }


}
