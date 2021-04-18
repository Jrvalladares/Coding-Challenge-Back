<?php

namespace App\Http\Documentation;

use Illuminate\Http\Request;

interface TruckDocumentation {

    /**
    * @OA\Get(
    *     tags={"TRUCKS"},
    *     path="/api/trucks",
    *     summary="Get a list of trucks.",
    *     @OA\Response(
    * 	       response=200,
    *         description="Process successfully completed"
    *     ),
    *     @OA\Response(
    * 	       response="default",
    *         description="Unexpected error"
    *     )
    * )
    */
   public function index(Request $request);


   /**
    * @OA\Post(
    *     tags={"TRUCKS"},
    *     path="/api/trucks",
    *     summary="Store a new truck.",
    *     @OA\Parameter(
    *         name="name",
    *         in="query",
    *         description="The name of the truck.",
    *         required=true,
    *         @OA\Schema(
    *             type="string"
    *         )
    *     ),
    *     @OA\Parameter(
    *         name="city",
    *         in="query",
    *         description="The city.",
    *         required=true,
    *         @OA\Schema(
    *             type="string"
    *         )
    *     ),
    *     @OA\Parameter(
    *         name="state",
    *         in="query",
    *         description="The state.",
    *         required=true,
    *         @OA\Schema(
    *             type="string"
    *         )
    *     ),
    *     @OA\Parameter(
    *         name="zip",
    *         in="query",
    *         description="The zip code.",
    *         required=true,
    *         @OA\Schema(
    *             type="string"
    *         )
    *     ),
    *    @OA\RequestBody(
    *         @OA\MediaType(
    *             mediaType="application/json",
    *             @OA\Schema(
    *                 @OA\Property(
    *                     property="name",
    *                     type="string"
    *                 ),
    *                 @OA\Property(
    *                     property="city",
    *                     type="string"
    *                 ),
    *                 @OA\Property(
    *                     property="state",
    *                     type="string"
    *                 ),
    *                 @OA\Property(
    *                     property="zip",
    *                     type="string"
    *                 ),
    *                 example={
    *                   "name": "Truck Name",
    *                   "city": "Guayana City",
    *                   "state": "Bolívar",
    *                   "zip": "0000"
    *                }
    *               
    *             )
    *         )
    *     ),
    *     @OA\Response(
    * 	       response=201,
    *         description="Process successfully completed"
    *     ),
    *     @OA\Response(
    * 	       response="default",
    *         description="Unexpected error"
    *     )
    * )
    */
   public function store(Request $request);


   /**
    * @OA\Put(
    *     tags={"TRUCKS"},
    *     path="/api/trucks/{id}",
    *     summary="Update the data for a particular truck. The identifier (ID) sent as a parameter corresponds to the truck in question.",
    *     @OA\Parameter(
    *         name="name",
    *         in="query",
    *         description="The name of the truck.",
    *         required=true,
    *         @OA\Schema(
    *             type="string"
    *         )
    *     ),
    *     @OA\Parameter(
    *         name="city",
    *         in="query",
    *         description="The city.",
    *         required=true,
    *         @OA\Schema(
    *             type="string"
    *         )
    *     ),
    *     @OA\Parameter(
    *         name="state",
    *         in="query",
    *         description="The state.",
    *         required=true,
    *         @OA\Schema(
    *             type="string"
    *         )
    *     ),
    *     @OA\Parameter(
    *         name="zip",
    *         in="query",
    *         description="The zip code.",
    *         required=true,
    *         @OA\Schema(
    *             type="string"
    *         )
    *     ),
    *     @OA\Response(
    * 	       response=200,
    *         description="Process successfully completed"
    *     ),
    *     @OA\Response(
    * 	       response="default",
    *         description="Unexpected error"
    *     )
    * )
    */
   public function update(Request $request, $id);


   /**
    * @OA\Delete(
    *     tags={"TRUCKS"},
    *     path="/api/trucks/{id}",
    *     summary="Delete the data for a particular truck. The identifier (ID) sent as a parameter corresponds to the truck in question.",
    *     @OA\Response(
    * 	       response=200,
    *         description="process successfully completed"
    *     ),
    *     @OA\Response(
    * 	       response="default",
    *         description="Unexpected error"
    *     )
    * )
    */
   public function destroy($id, Request $request);

}