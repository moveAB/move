<?php

require_once dirname(__FILE__)."/BaseDao.Class.php";

class ExaminationDao extends BaseDao
{
    public function insert_examination($examination)
    {
        $this->insert("examinations", $examination);
    }

    public function get_all_examinations()
    {
        return $this->query("SELECT a.id, b.date FROM examinations a
                        	JOIN appointments b ON a.appointment_id = b.id",[] 
                            );
    }
}