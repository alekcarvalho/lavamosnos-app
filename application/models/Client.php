<?php

require_once "base/absClient.php";

class Client extends absClient {

    public function register(){

        $data = $this->arrData();

        if(!is_array($data))
            return false;

        $data['clave'] = password_hash(base64_decode($data['clave']), PASSWORD_BCRYPT);
        
        $data['dtRegister'] = date('Y-m-d H:i:s');

        $this->db->insert($this->__table, $data);

        $id = $this->db->insert_id();

        $data = $this->dataToReturn($data);

        return array(
        				"status"    => true,
        				"id"        => $id,
        				"data"      => $data
        			); 

    }

    public function login(){

        $data = $this->arrData();

        $auth = false;

        if(!is_array($data))
            return false;

        $data['clave'] = base64_decode($data['clave']);

        $this->db->select('clave');
        $this->db->from($this->__table);
        $this->db->where(['email' => $data['email']]);
        $this->db->limit(1);

        $query = $this->db->get();  

        if($this->db->count_all_results() > 0){

            $result = $query->row();

            if(password_verify($data['clave'], $result->clave)){

                $auth = true;

            }

        }

        return array(
                        "status"            => true,
                        "authentication"    => $auth,
                        "token"             => 'ghgjfhgdhgdd'
                    ); 

    }

    public function edit(){

        $data = $this->arrData();

        if(!is_array($data))
            return false;

        $where = array(
                        'idClient' => $data['idClient'],
                        'status' => 1
                        );

        unset($data['idClient']);

        foreach ($data as $key => $value) 
            $this->db->set($key, $value);

        $this->db->where($where);
        
        $edit = $this->db->update($this->__table);

        return array(
                        "status"    => true,
                        "edit"      => $edit
                    ); 

    }

    public function address(){

        $data = $this->arrData();

        if(!is_array($data))
            return false;
        
        $data['dtRegister'] = date('Y-m-d H:i:s');

        $this->db->insert($this->__table.'_address', $data);

        $id = $this->db->insert_id();

        $data = $this->dataToReturn($data);

        return array(
                        "status"    => true,
                        "id"        => $id,
                        "data"      => $data
                    ); 

    }

    private function dataToReturn($data){

        foreach ($data as $key => $value)
            if(in_array($key, $this->__protected))
                unset($data[$key]);

        return $data;

    }

}