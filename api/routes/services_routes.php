<?php

/**
 * @OA\Post(path="/admin/service", tags={"Admin", "Services"}, security={{"ApiKeyAuth": {}}},
 * @OA\RequestBody(
    * description="Main service info",
    * required=true,
        * @OA\MediaType(mediaType="application/json",
            * @OA\Schema(
                * @OA\Property(property="type", type="string", example="", description="Type in type"),
                * @OA\Property(property="price", type="integer", example="", description="Type in price"),
                * @OA\Property(property="description", type="string", example="", description="Type in description") ) ) ),
 * @OA\Response(response="200", description="Insert service in database")
 * )
 *  
 */
Flight::route('POST /admin/service', function(){
    $data=Flight::request()->data->getData();
    Flight::serviceService()->insert_service($data);
    Flight::json($data);
});

/**
 * @OA\Put(path="/admin/service/update/{id}", tags={"Admin", "Services"}, security={{"ApiKeyAuth": {}}},
 * @OA\RequestBody(
    * description="Service info for update",
    * required=true,
        * @OA\MediaType(mediaType="application/json",
            * @OA\Schema(
                * @OA\Property(property="type", type="string", example="", description="Type in new type"),
                * @OA\Property(property="price", type="integer", example="", description="Type in new price"),
                * @OA\Property(property="description", type="string", example="", description="Type in new description") ) ) ),
 * @OA\Parameter(@OA\Schema(type="string"),in="path",allowReserved=true,name="id",default=1),
 * @OA\Response(response="200", description="Update service")
 * )
 *  
 */
Flight::route('PUT /admin/service/update/@id', function($id){
    $data=Flight::request()->data->getData();
    Flight::serviceService()->update_service_by_id($data, $id);
    Flight::json($data);
});

/**
 * @OA\Get(
 *     path="/services", tags={"All users", "Services"},
 *     @OA\Response(response="200", description="Get services from database")
 * )
 */
Flight::route('GET /services', function(){
    Flight::json(Flight::serviceService()->get_all_services());
})

?>