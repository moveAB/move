<?php

/**
 * @OA\Get(path="/generals", tags={"Generals", "All users"},
 *      @OA\Response(response="200", description="Get general info from database by name of column saved below"),
 * )
 */
Flight::route('GET /generals', function(){
    Flight::json(Flight::generalService()->get_general());
});


/**
 * @OA\Put(path="/admin/generals/update/{entity}", tags={"Admin", "Generals"},
 * @OA\RequestBody(
    * description="General info for update",
    * required=true,
        * @OA\MediaType(mediaType="application/json",
            * @OA\Schema(
                * @OA\Property(property="about", type="string", example="", description="Type in new about section"),
                * @OA\Property(property="email", type="integer", example="", description="Type in new email"),
                * @OA\Property(property="address", type="string", example="", description="Type in new address"),
                * @OA\Property(property="phone_number", type="string", example="", description="Type in new phone number") ) ) ),
 * @OA\Parameter(@OA\Schema(type="string"),in="path",allowReserved=true,name="id",default="phone_number"),
 * @OA\Response(response="200", description="Update service")
 * )
 *  
 */
Flight::route('PUT /admin/generals/update/@entity', function(){
    $data=Flight::request()->data->getData();
    Flight::generalService()->update_generals($data);
});