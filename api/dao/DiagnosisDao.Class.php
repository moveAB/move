<?php

require_once dirname(__FILE__)."/BaseDao.Class.php";

class DiagnosisDao extends BaseDao
{
    public function insert_diagnosis($diagnosis)
    {
        $this->insert("diagnosis", $diagnosis);
    }

    public function update_diagnosis_by_id($diagnosis, $id)
    {
        $this->update("diagnosis", $id, $diagnosis);
    }
}