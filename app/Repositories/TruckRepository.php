<?php

namespace app\Repositories;

use App\Models\Truck;

class TruckRepository
{
    /**
     * @var Truck
     */
    protected $truck;

    /**
     * TruckRepository constructor.
     *
     * @param Truck $truck
     */
    public function __construct(Truck $truck)
    {
        $this->truck = $truck;
    }

    /**
     * Get all records.
     *
     * @return Collection $truck
     */
    public function getAll()
    {
        return $this->truck->get();
    }

    /**
     * Store Truck
     *
     * @param array $data
     * @return Truck
     */
    public function saveTruck($data)
    {
        $truck = $this->truck::create($data);
        return $truck->fresh();
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
        $truck = $this->truck::find($id);

        if (!isset($truck))
        {  return ['error' => 'The record you want to update does not exist.', 'status' => 400];  }
        
        $truck->update($data);

        return ['data' => $truck, 'status' => 200];
    }

    /**
     * Delete Truck
     *
     * @param integer $id
     * @return Truck
     */
    public function deleteTruck($id)
    {
        $truck = $this->truck::find($id);

        if (!isset($truck))
        {  return ['error' => 'The record you want to delete does not exist.', 'status' => 400];  }

        $truck->delete();

        return ['data' => [], 'message' => 'Truck deleted.', 'status' => 200];
    }
}