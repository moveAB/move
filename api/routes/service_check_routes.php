<?php

/**
 * @OA\Get(path="/users/services/appointment/{id}",tags={"Services", "Users"},
 *      @OA\Parameter(@OA\Schema(type="string"),in="path",allowReserved=true,name="id",default="1"),
 *      @OA\Response(response="200", description="Get services from database by appointment id parameter"),
 * )
 */
Flight::route('GET /users/services/appointment/@id', function($id){
    Flight::json(Flight::serviceCheckService()->get_services_by_appointment_id($id));
});

/**
 * @OA\Get(path="/users/price/appointments/{id}", tags={"Appointments", "Users"},
 *      @OA\Parameter(@OA\Schema(type="string"),in="path",allowReserved=true,name="id",default="1"),
 *      @OA\Response(response="200", description="Get price for appointment by appointment id parameter"),
 * )
 */
Flight::route('GET /users/price/appointments/@id', function($id){
    Flight::json(Flight::serviceCheckService()->get_total_price_for_appointment($id));
});

/**
 * @OA\Post(path="/admin/service-check", tags={"Admin", "Services"},
 * @OA\RequestBody(
    * description="Many to many service table",
    * required=true,
        * @OA\MediaType(mediaType="application/json",
            * @OA\Schema(
                * @OA\Property(property="service_id", type="integer", example="", description="Type in service_id"),
                * @OA\Property(property="appointment_id", type="integer", example="", description="Type in appointment_id") ) ) ),
 * @OA\Response(response="200", description="Insert service_check in database")
 * )
 *  
 */
Flight::route('POST /admin/service-check', function(){
    $data=Flight::request()->data->getData();
    Flight::serviceCheckService()->add_service_check($data);
    Flight::json($data);
});