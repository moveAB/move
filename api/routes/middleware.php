<?php



Flight::route('/users/*', function(){
        
        if(Flight::request()->url == '/swagger/') return TRUE;
        $headers=getallheaders();
        $token=@$headers['Authorization'];
        try
        {
            $user=(array)\Firebase\JWT\JWT::decode($token, "JWT SECRET", ["HS256"]);
            Flight::set('user', $user);
            if(!isset($user))
            {
                throw new Exception("You must be logged in to perform this action", 401);
            }
            return TRUE;
        }
        catch(Exception $e)
        {
            Flight::json(["message" => $e->getMessage()], 403);
            die;
        }
    });

    Flight::route('/admin/*', function(){
        
        if(Flight::request()->url == '/swagger/') return TRUE;
        $headers=getallheaders();
        $token=@$headers['Authorization'];
        try
        {
            $user=(array)\Firebase\JWT\JWT::decode($token, "JWT SECRET", ["HS256"]);
            Flight::set('user', $user);
            if($user['role'] != 'ADMIN')
            {
                throw new Exception("This can be done only by admin", 401);
            }
            return TRUE;
        }
        catch(Exception $e)
        {
            Flight::json(["message" => $e->getMessage()], 403);
            die;
        }
    });