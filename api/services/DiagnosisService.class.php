<?php

    require_once dirname(__FILE__)."/../dao/DiagnosisDao.Class.php";

    class DiagnosisService
    {
        private $dao;

        public function __construct()
        {
            $this->dao=new DiagnosisDao();
        }

        public function insert_diagnosis($diagnosis)
        {
            $this->dao->insert_diagnosis($diagnosis);
        }

        public function update_diagnosis($diagnosis, $id)
        {
            $this->dao->update_diagnosis_by_id($diagnosis, $id);
        }

    }