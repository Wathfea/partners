<?php

namespace App\Persistence\Repositories\Interfaces;

use App\Models\Partner;
use Illuminate\Contracts\Pagination\Paginator;

interface PartnerRepository
{
    /**
     * @param int $page
     * @param int $limit
     *
     * @return Paginator
     */
    public function getAll(int $page, int $limit): Paginator;

    /**
     * @param Partner $partner
     * @return bool
     */
    public function store(Partner $partner): bool;

    /**
     * @param int $id
     * @return Partner
     */
    public function findById(int $id): ?Partner;

    /**
     * @param int $id
     * @return bool
     */
    public function remove(int $id): bool;

    /**
     * @param int $id
     * @param array $data
     * @return Partner
     */
    public function update(int $id, array $data): Partner;

    /**
     * @param Partner $partner
     * @param array $propertyIds
     * @return array
     */
    public function savePivot(Partner $partner, array $propertyIds): array ;
}