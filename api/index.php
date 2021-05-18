<?php

#Import FlightPHP modules
require dirname(__FILE__).'/../vendor/autoload.php';


#Import Services layer
require_once dirname(__FILE__)."/services/UserService.class.php";
require_once dirname(__FILE__)."/services/ServiceService.class.php";
require_once dirname(__FILE__)."/services/ServiceCheckService.class.php";
require_once dirname(__FILE__)."/services/AppointmentService.class.php";
require_once dirname(__FILE__)."/services/GeneralService.class.php";
require_once dirname(__FILE__)."/services/ExaminationService.class.php";
require_once dirname(__FILE__)."/services/DiagnosisCheckService.class.php";
require_once dirname(__FILE__)."/services/DiagnosisService.class.php";
require_once dirname(__FILE__)."/services/WorkoutService.class.php";
require_once dirname(__FILE__)."/services/WorkoutCheckService.class.php";

#Registering Service layer
Flight::register('userService', 'UserService');
Flight::register('serviceService', 'ServiceService');
Flight::register('serviceCheckService', 'ServiceCheckService');
Flight::register('appointmentService', 'AppointmentService');
Flight::register('generalService', 'GeneralService');
Flight::register('examinationService', 'ExaminationService');
Flight::register('diagnosisCheckService', 'DiagnosisCheckService');
Flight::register('diagnosisService', 'DiagnosisService');
Flight::register('workoutService', 'WorkoutService');
Flight::register('workoutCheckService', 'WorkoutCheckService');

#Mapping 'query' function
Flight::map('query', function($name, $default_value){
    $request=Flight::request();
    $query_param=@$request->data->getData()[$name];
    $query_param = $query_param ? $query_param : $default_value;
    return $query_param;
});

#Swagger documentation
Flight::route('GET /swagger', function(){
    $openapi = @\OpenApi\scan(dirname(__FILE__)."/routes");
    header('Content-Type: application/json');
    echo $openapi->toJson();
  });
  
  Flight::route('GET /', function(){
    Flight::redirect('/docs');
  });
  
#Import Routes layer
require_once dirname(__FILE__)."/routes/middleware.php";
require_once dirname(__FILE__)."/routes/users_routes.php";
require_once dirname(__FILE__)."/routes/services_routes.php";
require_once dirname(__FILE__)."/routes/service_check_routes.php";
require_once dirname(__FILE__)."/routes/appointments_routes.php";
require_once dirname(__FILE__)."/routes/generals_routes.php";
require_once dirname(__FILE__)."/routes/examinations_routes.php";
require_once dirname(__FILE__)."/routes/diagnosis_check_routes.php";
require_once dirname(__FILE__)."/routes/diagnosis_routes.php";
require_once dirname(__FILE__)."/routes/workouts_routes.php";
require_once dirname(__FILE__)."/routes/workout_check_routes.php";

Flight::start();