<?php

/**
 * @OA\Get(path="/users/diagnosis/examinations/{id}", tags={"Users", "Admin", "Diagnosis"}, security={{"ApiKeyAuth": {}}},
 *      @OA\Parameter(@OA\Schema(type="string"),in="path",allowReserved=true,name="id",default="1"),
 *      @OA\Response(response="200", description="Get diagnosis from database by examination id parameter"),
 * )
 */
Flight::route('GET /users/diagnosis/examinations/@id', function($id){
    Flight::json(Flight::diagnosisCheckService()->get_diagnosis_by_examination_id($id));
});

/**
 * @OA\Get(path="/users/diagnosis/{id}", tags={"Users", "Admin", "Diagnosis"}
 *      @OA\Parameter(@OA\Schema(type="string"),in="path",allowReserved=true,name="id",default="1"),
 *      @OA\Response(response="200", description="Get diagnosis from database by user id parameter"),
 * )
 */
Flight::route('GET /users/diagnosis/@id', function($id){
    Flight::json(Flight::diagnosisCheckService()->get_diagnosis_by_user_id($id));
});

/**
 * @OA\Post(path="/admin/diagnosis-check", tags={"Admin", "Diagnosis"}, security={{"ApiKeyAuth": {}}},
 * @OA\RequestBody(
    * description="Many to many diagnosis table",
    * required=true,
        * @OA\MediaType(mediaType="application/json",
            * @OA\Schema(
                * @OA\Property(property="diagnosis_id", type="integer", example="", description="Type in diagnosis_id"),
                * @OA\Property(property="examination_id", type="integer", example="", description="Type in examination_id") ) ) ),
 * @OA\Response(response="200", description="Insert diagnosis_check in database")
 * )
 *  
 */
Flight::route('POST /admin/diagnosis-check', function(){
    $data=Flight::request()->data->getData();
    Flight::diagnosisCheckService()->add_diagnosis_check($data);
    Flight::json($data);
});