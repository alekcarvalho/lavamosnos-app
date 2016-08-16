<?php

class Migration_laundry_address_03 extends CI_Migration{

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

        $this->dbforge->add_column('laundry_address', $fields);

    }

    public function down(){

        $this->dbforge->drop_column('laundry_address', 'latitude');
        $this->dbforge->drop_column('laundry_address', 'longitude');
        
    }

}