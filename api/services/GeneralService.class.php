<?php

    require_once dirname(__FILE__)."/../dao/GeneralDao.Class.php";

    class GeneralService
    {
        private $dao;

        public function __construct()
        {
            $this->dao=new GeneralDao();
        }

        public function get_general($entity)
        {
            return $this->dao->get_general($entity);
        }

        public function update_generals($entity)
        {
            $this->dao->update_generals($entity);
        }

    }
?>