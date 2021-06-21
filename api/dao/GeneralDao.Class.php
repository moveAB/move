<?php

class GeneralDao extends BaseDao
{
    
    public function update_generals($entity)
    {
        $sql="UPDATE general SET ";
        foreach($entity as $key => $value)
        {
            $sql.= $key ." = :" .$key . ", ";
        }
        $sql=substr($sql, 0, -2);
        $stmt=$this->connection->prepare($sql);
        $stmt->execute($entity);
    }

    public function get_general()
    {
        return $this->query("SELECT * FROM general",[]);
    } 
}