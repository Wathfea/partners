<?php


namespace App\Services;


use App\Models\Partner;
use App\Persistence\Repositories\Interfaces\PartnerRepository;

class PartnerService
{
    /* @var PartnerRepository */
    private $repository;

    /**
     * PartnerService constructor.
     * @param PartnerRepository $repository
     */
    public function __construct(PartnerRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $data
     * @return bool
     * @throws \Exception
     */
    public function create($data)
    {
        //Ez esetleg mehetne egy külön factoryba, ha sok adatot akarnánk menteni
        // $this->partnerFactory->createFromRequest($data) ....
        $partner = new Partner($data);

        try {
            $newPartner = $this->repository->store($partner);
            return $newPartner;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param int $id
     * @param array $data
     * @return Partner
     * @throws \Exception
     */
    public function update(int $id, array $data)
    {
        try {
            $newPartner = $this->repository->update($id, $data);
            return $newPartner;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param int $id
     * @return bool
     * @throws \Exception
     */
    public function delete(int $id)
    {
        try {
            $deleted = $this->repository->remove($id);
            return $deleted;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}