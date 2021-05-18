<?php

/**
 * @OA\Get(
 *     path="/admin/examinations", tags={"Examinations", "Admin"}, security={{"ApiKeyAuth": {}}},
 *     @OA\Response(response="200", description="Get examinations from database")
 * )
 */
Flight::route('GET /admin/examinations', function(){
    Flight::json(Flight::examinationService()->get_examinations());
});

/**
 * @OA\Post(path="/admin/examination", tags={"Examinations", "Admin"},
 * @OA\RequestBody(
    * description="Main examination info",
    * required=true,
        * @OA\MediaType(mediaType="application/json",
            * @OA\Schema(
                * @OA\Property(property="appointment_id", type="integer",required=true, example="", description="Type in appointment id") ) ) ),
 * @OA\Response(response="200", description="Insert examination in database")
 * )
 *  
 */
Flight::route('POST /admin/examination', function(){
    $data=Flight::request()->data->getData();
    Flight::examinationService()->insert_examination($data);
    Flight::json($data);
});