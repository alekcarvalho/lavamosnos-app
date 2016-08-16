<?php

require_once "base/absNotification.php";

class Notification extends absNotification {

    public function register()
    {

    	$data = $this->arrData();

        if(!is_array($data))
            return false;

        return $this->db->insert($this->__table, $data); 

    }

    public function getInbox(){

    	$data = $this->arrData();

        if(!is_array($data))
            return false;

        $this->db->from($this->__table);
        $this->db->where($data);
        
        $query = $this->db->get();  

        $result = [];

        if($query->num_rows() > 0)
            $result = $query->result_array();

        return $result;

    }

}