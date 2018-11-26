<?php

namespace App\Persistence\Repositories\Interfaces;

use App\Models\Property;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;

interface PropertyRepository
{
    /**
     * @param int $page
     * @param int $limit
     *
     * @return Paginator
     */
    public function getAll(int $page, int $limit): Paginator;

    /**
     * @return Collection
     */
    public function getAllCollection(): Collection;

    /**
     * @param Property $property
     * @return bool
     */
    public function store(Property $property): bool;

    /**
     * @param int $id
     * @return Property
     */
    public function findById(int $id): ?Property;

    /**
     * @param int $id
     * @return bool
     */
    public function remove(int $id): bool;

    /**
     * @param int $id
     * @param array $data
     * @return Property
     */
    public function update(int $id, array $data): Property;
}