<?php

namespace App\Repositories;

use App\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class AbstractRepository implements RepositoryInterface
{
    protected $model;

    /**
     * AbstractRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Find one register
     *
     * @paran int $id
     * @return array
     */
    public function find(int $id): Model
    {
        return $this->model::find($id);
    }

    /**
     * Get all registers
     *
     * @return array
     */
    public function all(): Collection
    {
        return $this->model::all();
    }

    /**
     * Gte with paginate
     *
     * @return array
     */

    public function filterPaginate(string|null $search = '', array $searchFields, int $limit = 10): mixed
    {
        $results = $this->model::orderby('id', 'desc')->where(function ($query) use ($searchFields, $search){
            $query->where($searchFields[0], 'like', '%' . $search . '%');
            if (count($searchFields) > 1 && $search != '') {
                foreach ($searchFields as $field) {
                    $query->orWhere($field, 'like', '%' . $search . '%');
                }
            }
        });

        return $results->paginate($limit)
            ->appends([
                'busca' => $search,
            ]);
    }

    /**
     * Create new register
     *
     * @paran array $data
     * @return array
     */
    public function create(array $data): Model
    {
        return $this->model::create($data);
    }

    /**
     * Update one register
     *
     * @paran int $id
     * @paran array $data
     * @return array
     */
    public function update(int $id, array $data): bool
    {
        return $this->model::findOrFail($id)->update($data);
    }

    /**
     * Delete one register
     *
     * @paran int $id
     * @return array
     */
    public function delete(int $id): bool
    {
        return $this->model::findOrFail($id)->delete();
    }
}
