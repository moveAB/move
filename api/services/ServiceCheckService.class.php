<?php

    require_once dirname(__FILE__)."/../dao/ServiceCheckDao.Class.php";

    class ServiceCheckService
    {
        private $dao;

        public function __construct()
        {
            $this->dao=new ServiceCheckDao();
        }

        public function get_services_by_appointment_id($appointment_id)
        {
            return $this->dao->get_services_by_appointment_id($appointment_id);
        }

        public function get_total_price_for_appointment($appointment_id)
        {
            return $this->dao->get_total_price_for_appointment($appointment_id);
        }

        public function add_service_check($service_check)
        {
            $this->dao->add_service_check($service_check);
        }

    }
?>