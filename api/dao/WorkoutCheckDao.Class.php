<?php

class WorkoutCheckDao extends BaseDao
{
    public function get_workouts_by_examination_id($examination_id)
    {
        return $this->query("SELECT a.type FROM workouts a
                            JOIN workouts_check b ON a.id=b.workout_id
                            JOIN examinations c ON c.id=b.workout_id
                            WHERE b.examination_id = :examination_id",
                            ["examination_id" => $examination_id]
                            );
    }

    public function get_workouts_by_user_id($user_id)
    {
        return $this->query("SELECT a.type FROM workouts a
                            JOIN workouts_check b ON a.id=b.workout_id
                            JOIN examinations c ON b.examination_id=c.id
                            JOIN appointments d ON c.appointment_id=d.id
                            WHERE d.user_id = :user_id",
                            ["user_id" => $user_id]
                            );
    }
}