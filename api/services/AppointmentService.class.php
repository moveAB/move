<?php

    require_once dirname(__FILE__)."/../dao/AppointmentDao.Class.php";

    class AppointmentService
    {
        private $dao;

        public function __construct()
        {
            $this->dao=new AppointmentDao();
        }

        public function get_all_appointments()
        {
            return $this->dao->get_all_appointments();
        }

        public function insert_appointment($appointment)
        {
            $this->dao->insert_appointment(
                [
                    "user_id" => $appointment['user_id'],
                    "date" => date('Y-m-d', strtotime($appointment['date'])),
                    "time" => date('H:i:s', strtotime($appointment['time'])),
                    "message" => $appointment['message']
                ]
            );
        }

        public function update_appointment($id, $appointment)
        {
            $this->dao->update_appointment($id, $appointment);
        }

        public function delete($email)
        {
            $this->dao->delete($email);
        }

    }
?>