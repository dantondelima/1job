<?php

namespace App\Repositories;

use App\Repositories\Interfaces\AdminRepositoryInterface;
use Illuminate\Support\Collection;

class AdminRepository extends AbstractRepository implements AdminRepositoryInterface
{
    public function allFilter(string|null $search = '', array $searchFields, int $limit = 10): mixed
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
}
