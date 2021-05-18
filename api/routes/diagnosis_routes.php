<?php

/**
 * @OA\Post(path="/admin/diagnosis/new", tags={"Admin", "Diagnosis"}, security={{"ApiKeyAuth": {}}},
 * @OA\RequestBody(
    * description="Main diagnosis info",
    * required=true,
        * @OA\MediaType(mediaType="application/json",
            * @OA\Schema(
                * @OA\Property(property="type", type="string", example="", description="Type in type"),
                * @OA\Property(property="price", type="integer", example="", description="Type in price"),
                * @OA\Property(property="description", type="string", example="", description="Type in description") ) ) ),
 * @OA\Response(response="200", description="Insert diagnosis in database")
 * )
 *  
 */
Flight::route('POST /admin/diagnosis/new', function(){
    $data=Flight::request()->data->getData();
    Flight::diagnosisService()->insert_diagnosis($data);
    Flight::json($data);
});

/**
 * @OA\Put(path="/admin/diagnosis/update/{id}", tags={"Admin", "Diagnosis"}, security={{"ApiKeyAuth": {}}},
 * @OA\RequestBody(
    * description="Diagnosis info for update",
    * required=true,
        * @OA\MediaType(mediaType="application/json",
            * @OA\Schema(
                * @OA\Property(property="type", type="string", example="", description="Type in new type"),
                * @OA\Property(property="description", type="string", example="", description="Type in new description") ) ) ),
 * @OA\Parameter(@OA\Schema(type="string"),in="path",allowReserved=true,name="id",default=1),
 * @OA\Response(response="200", description="Update diagnosis")
 * )
 *  
 */
Flight::route('PUT /admin/diagnosis/update/@id', function($id){
    $data=Flight::request()->data->getData();
    Flight::diagnosisService()->update_diagnosis($data, $id);
    Flight::json($data);
});