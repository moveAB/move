<?php

require_once dirname(__FILE__)."/BaseDao.Class.php";

class WorkoutDao extends BaseDao
{
    public function insert_workout($workout)
    {
        $this->insert("workouts", $workout);
    }

    public function update_workout_by_type($workout,$type)
    {
        $this->update("workouts", $type, $workout, "type");
    }
    
    public function update_workout_by_id($workout,$id)
    {
        $this->update("workouts", $id, $workout);
    }

}