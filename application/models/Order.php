<?php

require_once "base/absOrder.php";

class Order extends absOrder {

    public function register(){

        $data = $this->arrData();

        if(!is_array($data))
            return false;
        
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

    public function deliveryPending(){

        $data = $this->arrData();

        if(empty($data))
            return false;

        $result = [];

        $this->db->select("idOrder, order.status, statusDelivery, 
                            client_address.latitude as latCli,
                            client_address.longitude as lngCli,
                            laundry_address.latitude as latLau,
                            laundry_address.longitude as lngLau,
                            CONCAT(client_address.address,', ',client_address.number,' - ',client_address.complement,' - ',client_address.neighborhood,' - ',client_address.city,' - ',client_address.estate) as addressClient, 
                            CONCAT(laundry_address.address,', ',laundry_address.number,' - ',laundry_address.complement,' - ',laundry_address.neighborhood,' - ',laundry_address.city,' - ',laundry_address.estate) as addressLaundry");
        
        $this->db->from($this->__table);
        $this->db->join('client_address', 'client_address.idClientAddress = order.idClientAddress');
        $this->db->join('laundry_address', 'laundry_address.idLaundryAddress = order.idLaundryAddress');
        $this->db->where($data);

        $status = array(1,5);
        $this->db->where_in('order.status', $status);

        $statusDelivery = array(1,2,4,5);
        $this->db->where_in('order.statusDelivery', $statusDelivery);

        $this->db->order_by('order.idOrder DESC');

        $query = $this->db->get(); 

        if($query->num_rows() > 0)
            $result = $query->result_array();

        return $result;

    }

    public function historic(){

        $data = $this->arrData();

        if(!is_array($data))
            return false;

        $limit = $data['limit'];
        unset($data['limit']);

        $offset =($data['offset'] == 'null' ? 0 :  $data['offset']);
        unset($data['offset']);

        $result = [];

        $this->db->select('order.idOrder, order.qty, order.status, client.name');
        $this->db->from('order');
        $this->db->join('client', 'client.idClient = order.idClient');
        $this->db->where($data);
        $this->db->order_by('order.idOrder DESC');
        $this->db->limit($limit, $offset);

        $query = $this->db->get();  

        if($query->num_rows() > 0)
            $result = $query->result_array();

        return array(
                        "data" => $result
                    ); 

    }

    public function dashboard(){

        $data = $this->arrData();

        if(!is_array($data))
            return false;

        $result = [];

        $status = array(1,3,4,5);

        $this->db->select('order.idOrder, order.qty, order.status, client.name');
        $this->db->from('order');
        $this->db->join('client', 'client.idClient = order.idClient');
        $this->db->where($data);

        // if(isset($data['idLaundry'])){

        //     $statusDelivery = array(3,4,5,6);
        //     $this->db->where_in('order.statusDelivery', $statusDelivery);

        // }

        $this->db->where_in('order.status', $status);
        $this->db->order_by('order.status, order.idOrder DESC');

        $query = $this->db->get();  

        if($query->num_rows() > 0)
            $result = $query->result_array();

        return array(
                        "data" => $result
                    ); 

    }

    public function changeDelivery(){

        $data = $this->arrData();

        if(!is_array($data))
            return false;

        $this->db->set('statusDelivery', $data['statusDelivery']);

        unset($data['statusDelivery']);

        $this->db->where($data);
        
        $edit = $this->db->update($this->__table);

        return array(
                        "change" => $edit
                    ); 

    }


    public function changeStatus(){

        $data = $this->arrData();

        if(!is_array($data))
            return false;

        $this->db->set('status', $data['status']);

        unset($data['status']);

        $this->db->where($data);
        
        $edit = $this->db->update($this->__table);

        return array(
                        "status"    => true,
                        "edit"      => $edit
                    ); 

    }

    public function insertItem(){

        $data = $this->arrData();

        if(!is_array($data))
            return false;

        foreach ($data['items'] as $k) {

            $k['idOrder'] = $data['idOrder'];
            $k['dtRegister'] = date('Y-m-d H:i:s');

            if(count($k['details']) > 0){

                $details['data'] = $k['details'];

                $details['idOrder'] = $data['idOrder'];

            }

            unset($k['details']);

            $this->db->insert($this->__table."_item", $k);

            if(isset($details)){

                $details['idOrderItem'] = $this->db->insert_id();

                $this->arrData($details);
                $this->insertDetail();

            }

            unset($details);

        }

        return array(
                        "insert" => true
                    ); 
    }

    public function insertDetail(){

        $data = $this->arrData();

        if(!is_array($data))
            return false;

        $dataInsert = [];

        foreach ($data['data'] as $k) {

            $dataInsert[] = array(
                                    'brand'         => $k['brand'],
                                    'type'          => $k['type'],
                                    'obs'           => $k['obs'],
                                    'idOrder'       => $data['idOrder'],
                                    'idOrderItem'   => $data['idOrderItem'],
                                    'dtRegister'    => date('Y-m-d H:i:s'),
                                 );

        }

        $this->db->insert_batch($this->__table."_detail", $dataInsert);

        return true; 
        
    }

    public function getDetail(){

        $data = $this->arrData();

        if(!is_array($data))
            return false;

        $this->db->select('order.*, client.name');
        $this->db->from($this->__table);
        $this->db->join('client', 'client.idClient = order.idClient');
        $this->db->where($data);
        $this->db->limit(1);

        $query = $this->db->get();  

        if($query->num_rows() > 0){

            $arrReturn = $query->result_array()[0];

            unset($data['idClient']);
            unset($data['idLaundry']);

            $this->db->from($this->__table.'_item');
            $this->db->where($data);

            $query = $this->db->get(); 

            $totalItems = $query->num_rows();

            $arrReturn['orderItem'] = null;

            if($totalItems > 0){

                $arrTemp = $query->result_array();

                foreach ($arrTemp as $k) {

                    $data['idOrderItem'] = $k['idOrderItem'];

                    $this->db->from($this->__table.'_detail');
                    $this->db->where($data);

                    $query = $this->db->get(); 

                    $k['orderDetail'] = null;

                    if($query->num_rows() > 0)
                        $k['orderDetail'] = $query->result_array();

                    $arrItens[] = $k;
                }

                $arrReturn['orderItem'] = $arrItens;

            }

        }

        return array(
                        "status"    => true,
                        "data"      => $arrReturn
                    ); 
        
    }

    private function dataToReturn($data){

        foreach ($data as $key => $value)
            if(in_array($key, $this->__protected))
                unset($data[$key]);

        return $data;

    }

}