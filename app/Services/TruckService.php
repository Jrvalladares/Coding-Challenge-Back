<?php

namespace app\Services;

use Exception;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Repositories\TruckRepository;

class TruckService
{
    /**
     * @var $TruckRepository
     */
    protected $TruckRepository;

    /**
     * TruckService constructor.
     *
     * @param TruckRepository $TruckRepository
     */
    public function __construct(TruckRepository $TruckRepository)
    {
        $this->TruckRepository = $TruckRepository;
    }

    /**
     * Get all Trucks.
     *
     * @return Collection
     */
    public function getAll()
    {
        return $this->TruckRepository->getAll();
    }

    /**
     * Store Truck
     * @param array $data
     * @return Truck
     */
    public function saveTruck($data)
    {
        DB::beginTransaction();

        try {
            $result = $this->TruckRepository->saveTruck($data);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException($e->getMessage());
        }

        DB::commit();

        return $result;
    }

    /**
     * Update Truck
     *
     * @param array $data
     * @param integer $id
     * @return Truck
     */
    public function updateTruck($data, $id)
    {
        DB::beginTransaction();

        try {
            $result = $this->TruckRepository->updateTruck($data, $id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException($e->getMessage());
        }

        DB::commit();

        return $result;
    }

    /**
     * Delete Truck
     *
     * @param integer $id
     * @return String
     */
    public function deleteTruck($id)
    {
        DB::beginTransaction();

        try {
            $result = $this->TruckRepository->deleteTruck($id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to delete post data');
        }

        DB::commit();

        return $result;
    }
}