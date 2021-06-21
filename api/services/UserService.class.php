<?php 
    require_once dirname(__FILE__)."/../dao/UserDao.Class.php";
    use \Firebase\JWT\JWT;
    class UserService 
    {
        
        private $dao;
        public function __construct()
        {
            $this->dao=new UserDao();
        }

        public function get_all_users($offset, $limit)
        {
            return $this->dao->get_all_users($offset, $limit);
        }

        public function get_user_by_id($id)
        {
            return $this->dao->get_user_by_id($id);
        }

        public function update_user_by_id($id, $user)
        {
            $this->dao->update_user_by_id($id, $user);
        }

        public function register($user)
        {
            $user=$this->dao->add_user([
                
                "first_name" => $user['first_name'],
                "last_name" => $user['last_name'],
                "email" => $user['email'],
                "password" => md5($user['password']),
                "phone_number" => $user['phone_number'],
                "token" => md5(random_bytes(16))

            ]);
        }

        public function confirm($token)
        {
            $user = $this->dao->get_user_by_token($token);
            if(!isset($user['id'])) throw new Exception("Invalid token");
            $this->dao->update_user_by_id($user['id'], ['status'=>'ACTIVE']);
        }

        public function login($user)
        {
            $db_user=$this->dao->get_user_by_email($user['email']);
            if(!isset($db_user['id'])) throw new Exception("User does not exist in database", 400);
            if($db_user['password'] != (md5($user['password']))) throw new Exception("Invalid password!", 400);
            return $db_user;
        }

        public function reset($user){
            $db_user = $this->dao->get_user_by_email($user['email']);
            $this->dao->update("users",$db_user['id'], ['password' => md5($user['password'])]);
            return $db_user;
          }
        
          public function forgot($user){
            $db_user = $this->dao->get_user_by_email($user['email']);
            if (!isset($db_user['id'])) throw new Exception("User doesn't exists", 400);
            //if (strtotime(date(Config::DATE_FORMAT)) - strtotime($db_user['token_created_at']) < 300) throw new Exception("Be patient tokens is on his way", 400);
            $db_user = $this->dao->update('users',$db_user['id'], ['token' => md5(random_bytes(16))]);
          }

          public function deleteUser($email)
          {
              $this->dao->deleteUser($email);
          }
    }
?>