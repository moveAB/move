<?php

class DiagnosisCheckDao extends BaseDao
{
    public function get_diagnosis_by_examination_id($examination_id)
    {
        return $this->query("SELECT a.type FROM diagnosis a
                            JOIN diagnosis_check b ON a.id=b.diagnosis_id
                            JOIN examinations c ON c.id=b.examination_id
                            WHERE c.id = :examination_id",
                            ["examination_id" => $examination_id]
                            );
    }

    public function get_diagnosis_by_user_id($user_id)
    {
        return $this->query("SELECT a.type FROM diagnosis a
                            JOIN diagnosis_check b ON a.id=b.diagnosis_id
                            JOIN examinations c ON b.examination_id=c.id
                            JOIN appointments d ON c.appointment_id=d.id
                            WHERE d.user_id = :user_id",
                            ["user_id" => $user_id]
                            );
    }

    public function add_diagnosis_check($diagnosis_check)
    {
        $this->insert("diagnosis_check",$diagnosis_check);
    }
}