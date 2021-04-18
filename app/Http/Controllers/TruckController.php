<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\TruckService;
use App\Http\Resources\TruckResource;
use App\Http\Documentation\TruckDocumentation;

class TruckController extends Controller implements TruckDocumentation
{
    protected $TruckService;

    public function __construct(TruckService $TruckService)
    {
        $this->TruckService = $TruckService;
    }

    public function index(Request $request)
    {
        $result = ['status' => 200];
        try {
            $result['data'] = $this->TruckService->getAll();
        } catch (Exception $e) {
            $result = ['status' => 500, 'error' => $e->getMessage()];
        }
        $result['data'] = TruckResource::collection($result['data']);

        return response()->json($result, $result['status']);
    }

    public function store(Request $request)
    {
        $rules = [
            'name'  => 'required|string|min:3|max:255',
            'city'  => 'required|string|min:3|max:200',
            'state' => 'required|string|min:3|max:200',
            'zip'   => 'required|min:2',
        ];

        $attributes = [
            'name'  => 'The name of the truck',
            'city'  => 'The city',
            'state' => 'The state',
            'zip'   => 'The zip code',     
        ];

        $messages = [
            'required'  => ':attribute is required.',
            'string'    => ':attribute must be a valid character string.',
            'min'       => ':attribute It must contain a minimum of 3 characters.',
            'zip.min'   => ':attribute It must contain a minimum of 2 characters.',
            'max'       => ':attribute must contain a maximum of 200 characters.',
            'name.max'  => ':attribute debe contener máximo 255 caracteres.',
        ];

        $validator = \Validator::make($request->all(), $rules, $messages, $attributes);
        if ($validator->fails()) //Validar Request
        {  return response()->json(['error' => $validator->errors()], 400);  }

        $data = $request->only(['name', 'city', 'state', 'zip']);

        $result = ['status' => 201];
        try {
            $result['data'] = $this->TruckService->saveTruck($data);
        } catch (Exception $e) {
            $result = ['status' => 500, 'error' => $e->getMessage()];
        }
        $result['data'] = new TruckResource($result['data']);

        return response()->json($result, $result['status']);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name'  => 'required|string|min:3|max:255',
            'city'  => 'required|string|min:3|max:200',
            'state' => 'required|string|min:3|max:200',
            'zip'   => 'required|min:2',
        ];

        $attributes = [
            'name'  => 'The name of the truck',
            'city'  => 'The city',
            'state' => 'The state',
            'zip'   => 'The zip code',     
        ];

        $messages = [
            'required'  => ':attribute is required.',
            'string'    => ':attribute must be a valid character string.',
            'min'       => ':attribute It must contain a minimum of 3 characters.',
            'zip.min'   => ':attribute It must contain a minimum of 2 characters.',
            'max'       => ':attribute must contain a maximum of 200 characters.',
            'name.max'  => ':attribute debe contener máximo 255 caracteres.',
        ];

        $validator = \Validator::make($request->all(), $rules, $messages, $attributes);
        if ($validator->fails()) //Validar Request
        {  return response()->json(['error' => $validator->errors()], 400);  }

        $data = $request->only(['name', 'city', 'state', 'zip']);

        try {
            $result = $this->TruckService->updateTruck($data, $id);
        } catch (Exception $e) {
            $result = ['status' => 500, 'error' => $e->getMessage()];
        }
        $result['data'] = new TruckResource($result['data']);

        return response()->json($result, $result['status']);
    }

    public function destroy($id, Request $request)
    {
        try {
            $result = $this->TruckService->deleteTruck($id);
        } catch (Exception $e) {
            $result = ['status' => 500, 'error' => $e->getMessage()];
        }

        return response()->json($result, $result['status']);
    }
}
