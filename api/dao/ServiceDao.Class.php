<?php

require_once dirname(__FILE__)."/BaseDao.Class.php";

class ServiceDao extends BaseDao
{
    public function insert_service($service)
    {
        $this->insert("services", $service);
    }
    
    public function update_service_by_id($service,$id)
    {
        $this->update("services", $id, $service);
    }

    public function get_all_services()
    {
        return $this->query("SELECT * FROM services", []);
    }
}