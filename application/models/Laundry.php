<?php

require_once "base/absLaundry.php";

class Laundry extends absLaundry {

    public function register(){

    	$data = $this->arrData();

        if(!is_array($data))
            return false;

        $register = false;

        $data['dtRegister'] = date('Y-m-d H:i:s');

        $this->db->insert($this->__table, $data);

        $id = $this->db->insert_id();

        if($id > 0)
            $register = true;

        return array(
        				"register" => $register
        			); 

    }

    public function login(){

        $data = $this->arrData();

        $auth = false;

        $dataReturn = [];

        if(!is_array($data))
            return false;

        $data['clave'] = base64_decode($data['clave']);

        $this->db->select('clave, idLaundry, name');
        $this->db->from($this->__table);
        $this->db->where(['email' => $data['email'],'status' => 1]);
        $this->db->limit(1);

        $query = $this->db->get();  

        if($query->num_rows() > 0){

            $result = $query->result_array()[0];

            if(password_verify($data['clave'], $result['clave'])){

                $auth = true;

                $dataReturn = $this->dataToReturn($result);

                if($data['code_auth'] == 'null'){

                    $data['code_auth'] = null;

                }else{

                    $code_auth = explode('||',base64_decode($data['code_auth']));

                    $data['code_auth'] = password_hash($code_auth[0], PASSWORD_BCRYPT);

                }

                $this->db->set('code_auth', $data['code_auth']);
                $this->db->where('idLaundry', $result['idLaundry']);
                
                $this->db->update($this->__table);

            }

        }

        return array(
                        "authentication"    => $auth,
                        "data"              => $dataReturn
                    ); 

    }

    public function checkCookie(){

        $data = $this->arrData();

        $cookie = false;

        $return = [];

        if(!is_array($data))
            return false;

        $code_auth = explode('||',base64_decode($data['code_auth']));

        $data['code_auth'] = $code_auth[0];
        $data['email'] = $code_auth[1];

        $this->db->select('idLaundry, name, code_auth');
        $this->db->from($this->__table);
        $this->db->where('email', $data['email']);
        $this->db->limit(1);

        $query = $this->db->get(); 

        if($query->num_rows() > 0){

            $result = $query->result_array()[0];

            if(password_verify($data['code_auth'], $result['code_auth'])){

                unset($result['code_auth']);

                $return = $result;
                $cookie = true; 

            }

        }            

        return array(
                        "check"     => $cookie,
                        "data"      => $return
                    );

    }

    public function checkRemember(){

        $data = $this->arrData();

        $remember = false;

        if(!is_array($data))
            return false;

        $data['remember'] = md5($data['remember']);

        $this->db->from($this->__table);
        $this->db->where($data);
        $this->db->limit(1);

        $query = $this->db->get(); 

        if($query->num_rows() > 0)
            $remember = true; 

        return array(
                        "check" => $remember
                    );

    }

    public function redefine(){

        $data = $this->arrData();

        $redefine = false;

        if(!is_array($data))
            return false;

        $data['clave'] = password_hash(base64_decode($data['clave']), PASSWORD_BCRYPT);

        $this->db->set('clave', $data['clave']);
        $this->db->set('remember', null);

        $this->db->where('idLaundry', $data['idLaundry']);
        $this->db->where('remember', md5($data['remember']));
        
        if($this->db->update($this->__table))
            $redefine = true; 

        return array(
                        "redefine" => $data
                    );

    }

    public function remember(){

        $data = $this->arrData();

        $remember = false;

        if(!is_array($data))
            return false;

        $this->db->select('idLaundry, name');
        $this->db->from($this->__table);
        $this->db->where(['email' => $data['email'],'status' => 1]);
        $this->db->limit(1);

        $query = $this->db->get();  

        if($query->num_rows() > 0){

            $result = $query->result_array()[0];

            $this->load->library('lavamosnos');

            $code = $this->lavamosnos->geraSenha();

            $this->db->set('remember', md5($code));

            $this->db->where(['idLaundry' => $result['idLaundry']]);
            
            $edit = $this->db->update($this->__table);

            $send = array(
                            'destiny_mail' => $data['email'],
                            'destiny_name' => $result['name'],
                            'subject' => 'Redefinição de senha',
                            'content' => site_url() . 'login/redefinir/' . $code.$result['idLaundry'],
                         );

            require_once FCPATH.'service/module/notification/notification.php';

            $email = new notificationModule('email');

            $remember = $email->send($send);

        }

        return array(
                        "remember" => $remember
                    ); 

    }

    public function secureEdit(){

        $data = $this->arrData();

        if(!is_array($data))
            return false;

        if(!empty($data['clave']) && ($data['clave'] != 'null')){

            $data['clave'] = password_hash(base64_decode($data['clave']), PASSWORD_BCRYPT);

            $this->db->set('clave', $data['clave']);

        }

        $this->db->set('emailSecundary', $data['email']);

        $this->db->where('idLaundry',$data['idLaundry']);
        
        $edit = $this->db->update($this->__table);

        return array(
                        "update" => true,
                    ); 

    }

    public function edit(){

        $data = $this->arrData();

        if(!is_array($data))
            return false;

        $where = array(
                        'idLaundry' => $data['idLaundry'],
                        'status' => 1
                        );

        unset($data['idLaundry']);

        foreach ($data as $key => $value) 
            $this->db->set($key, $value);


        $this->db->where($where);
        
        $edit = $this->db->update($this->__table);

        return array(
                        "status" => true,
                        "edit" => $edit
                    ); 

    }

    public function address(){

        $data = $this->arrData();

        if(!is_array($data))
            return false;
        
        $data['dtRegister'] = date('Y-m-d H:i:s');

        $this->db->replace($this->__table.'_address', $data);

        return array(
                        "update" => true,
                    ); 

    }

    public function failDelivery(){

        $data = $this->arrData();

        $delivery = false;

        if(empty($data))
            return false;

        $data['dtRegister'] = date('Y-m-d H:i:s');

        $this->db->insert($this->__table.'_address_failed', $data);

        return $delivery;

    }

    public function getInfo(){

        $data = $this->arrData();

        if(empty($data))
            return false;

        $result = array(
                        'info' => [],
                        'address' => []
                       );

        $this->db->from($this->__table);
        $this->db->where($data);
        $this->db->limit(1);

        $query = $this->db->get();  

        if($query->num_rows() > 0)
            $result['info'] = $this->dataToReturn($query->result_array()[0]);

        $this->db->from($this->__table . '_address');
        $this->db->where($data);
        $this->db->limit(1);
        
        $query = $this->db->get();  

        if($query->num_rows() > 0)
            $result['address'] = $query->result_array()[0];

        return $result;

    }

    public function registerImage(){

        $data = $this->arrData();

        if(!is_array($data))
            return false;

        if($data['imagem'] == 'null')
            $data['imagem'] = null;

        $this->db->set('imagem', $data['imagem']);

        $this->db->where('idLaundry', $data['idLaundry']);
        
        $edit = $this->db->update($this->__table);

        return array(
                        "udpate" => true
                    ); 

    }

    private function dataToReturn($data){

        foreach ($data as $key => $value)
            if(in_array($key, $this->__protected))
                unset($data[$key]);

        return $data;

    }

}