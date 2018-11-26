<?php


namespace App\Services;

use App\Persistence\Factories\PropertyFactory;
use App\Persistence\Repositories\Interfaces\PropertyRepository;

class PropertyService
{
    /* @var PropertyRepository */
    private $repository;
    /* @var PropertyFactory */
    private $propertyFactory;

    /**
     * PartnerService constructor.
     * @param PropertyRepository $repository
     * @param PropertyFactory $propertyFactory
     */
    public function __construct(PropertyRepository $repository, PropertyFactory $propertyFactory)
    {
        $this->repository = $repository;
        $this->propertyFactory = $propertyFactory;
    }


    /**
     * @param $data
     * @return bool
     * @throws \Exception
     */
    public function create($data)
    {
        $property = $this->propertyFactory->createFromRequest($data);

        try {
            $newProperty = $this->repository->store($property);
            return $newProperty;
        } catch (\Exception $e) {
            throw $e;
        }
    }


    /**
     * @param int $id
     * @param array $data
     * @return \App\Models\Property
     * @throws \Exception
     */
    public function update(int $id, array $data)
    {
        $property = $this->propertyFactory->createFromRequest($data)->toArray();

        try {
            $newProperty = $this->repository->update($id, $property);
            return $newProperty;
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