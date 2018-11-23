<?php

namespace App\Persistence\Repositories;

use App\Models\Partner;
use App\Persistence\Repositories\Interfaces\PartnerRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;

class EloquentPartnerRepository implements PartnerRepository
{
    /* @var Partner */
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
}
