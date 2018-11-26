<?php

namespace App\Persistence\Repositories;

use App\Models\Property;
use App\Persistence\Repositories\Interfaces\PropertyRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;


class EloquentPropertyRepository implements PropertyRepository
{
    /* @var Property */
    private $model;

    /**
     * EloquentPartnerRepository constructor.
     *
     * @param Property $model
     */
    public function __construct(Property $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function getAll(int $page, int $limit): Paginator
    {
        return $this->model->newQuery()
            ->orderBy('id', 'DESC')
            ->paginate($limit, ['*'], 'page', $page);
    }

    /**
     * @inheritDoc
     */
    public function store(Property $property): bool
    {
        return $property->save();
    }

    /**
     * @inheritDoc
     */
    public function findById(int $id): ?Property
    {
        return $this->model->find($id);
    }

    /**
     * @inheritDoc
     */
    public function remove(int $id): bool
    {
        $property = $this->findById($id);

        return $property->delete();
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $data): Property
    {
        $property = $this->findById($id);
        $property->fill($data)->save();

        return $property;
    }

    /**
     * @inheritDoc
     */
    public function getAllCollection(): Collection
    {
        return $this->model->all();
    }
}
