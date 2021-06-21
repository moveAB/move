<?php

require_once dirname(__FILE__)."/BaseDao.Class.php";

class AppointmentDao extends BaseDao
{
    public function get_all_appointments()
    {
        return $this->query("SELECT * FROM appointments", []);
    }

    public function insert_appointment($appointment)
    {
        $this->insert("appointments", $appointment);
    }

    public function update_appointment($id, $appointment)
    {
        $this->update("appointments", $id, $appointment);
    }

    public function delete($email)
    {
        $this->delete($email);
    }
}