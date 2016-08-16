<?php

class Migration_client_address_04 extends CI_Migration{

    public function up(){

        $fields = array(
                      'latitude' => array(
                         'type' => 'FLOAT',
                         'null' => true,
                         'after' => 'estate'
                      ),
                      'longitude' => array(
                         'type' => 'FLOAT',
                         'null' => true,
                         'after' => 'estate'
                      )
                   );

        $this->dbforge->add_column('client_address', $fields);

    }

    public function down(){

        $this->dbforge->drop_column('client_address', 'latitude');
        $this->dbforge->drop_column('client_address', 'longitude');
        
    }

}