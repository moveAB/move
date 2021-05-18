<?php

    require_once dirname(__FILE__)."/../dao/ExaminationDao.Class.php";

    class ExaminationService
    {
        private $dao;

        public function __construct()
        {
            $this->dao=new ExaminationDao();
        }

        public function get_examinations()
        {
            return $this->dao->get_all_examinations();
        }

        public function insert_examination($examination)
        {
            $this->dao->insert_examination($examination);
        }

    }
?>