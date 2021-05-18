<?php

require_once dirname(__FILE__)."/BaseDao.Class.php";

class ServiceCheckDao extends BaseDao
{
    public function get_services_by_appointment_id($appointment_id)
    {
        return $this->query(
                                "SELECT a.type, a.price FROM services a
                                JOIN services_check b ON a.id=b.service_id
                                JOIN appointments c ON b.appointment_id=c.id
                                WHERE c.id = :appointment_id",
                                ['appointment_id' => $appointment_id]
                            );
    }

    public function get_total_price_for_appointment($appointment_id)
    {
        return $this->query(
                                "SELECT SUM(a.price) AS Price FROM services a
                                JOIN services_check b ON a.id=b.service_id
                                JOIN appointments c ON b.appointment_id=c.id
                                WHERE c.id = :appointment_id",
                                ['appointment_id' => $appointment_id]
                            );
    }

    public function add_service_check($service_check)
    {
        $this->insert("services_check",$service_check);
    }
}