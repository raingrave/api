<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

/**
 * Class Repository
 * @package App\Repositories
 */
abstract class Repository implements RepositoryContract
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Repository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getModel() : Model
    {
        return $this->model;
    }

    public function getAll() : Collection {

        return $this->model->get($this->getFields());
    }

    public function paginate($perPage = 20) : LengthAwarePaginator {
        return $this->model->paginate($perPage);
    }

    public function findById(int $id) : Model {

        return $this->model->findOrFail($id);
    }

    public function findByField(string $field, $value) {

        $values = $this->model->where($field, $value);

        return $values->count() == 1 ? $values->first() : $values->get($this->getFields());
    }

    public function create(array $data) : Model
    {
        if (array_key_exists('password', $data)) {
            $data['password'] = bcrypt($data['password']);
        }

        return $this->model->create($data);
    }

    public function update(array $data, int $id) : bool
    {
        return $this->model->findOrFail($id)->update($data);
    }

    public function delete(int $id) : bool
    {
        return $this->model->findOrFail($id)->delete();
    }

    private function getFields()
    {
        return request()->has('fields') ? explode(',', request()->fields) : '*';
    }
}
