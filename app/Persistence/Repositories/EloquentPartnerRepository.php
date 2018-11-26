<?php

namespace App\Persistence\Repositories;

use App\Models\Partner;
use App\Persistence\Repositories\Interfaces\PartnerRepository;
use Illuminate\Contracts\Pagination\Paginator;

class EloquentPartnerRepository implements PartnerRepository
{
    /** @var Partner */
    private $model;

    /**
     * EloquentPartnerRepository constructor.
     *
     * @param Partner $model
     */
    public function __construct(Partner $model)
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
    public function store(Partner $partner): bool
    {
        return $partner->save();
    }

    /**
     * @inheritDoc
     */
    public function findById(int $id): ?Partner
    {
        return $this->model->find($id);
    }

    /**
     * @inheritDoc
     */
    public function remove(int $id): bool
    {
        $partner = $this->findById($id);

        return $partner->delete();
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $data): Partner
    {
        $partner = $this->findById($id);
        $partner->fill($data)->save();

        return $partner;
    }

    /**
     * @inheritDoc
     */
    public function savePivot(Partner $partner, array $propertyIds): array
    {
        return $partner->properties()->sync($propertyIds);
    }
}
