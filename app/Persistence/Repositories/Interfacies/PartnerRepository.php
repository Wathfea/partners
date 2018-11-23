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
}