<?php

class Migration_client_address_01 extends CI_Migration{

    public function up(){

        $this->dbforge->add_field(
           array(
              'idClientAddress' => array(
                 'type' => 'BIGINT',
                 'unsigned' => true,
                 'auto_increment' => true
              ),
              'idClient' => array(
                 'type' => 'BIGINT',
                 'unsigned' => true,
              ),
           )
        );

        $this->dbforge->add_key('idClientAddress', TRUE);
        $this->dbforge->create_table('client_address');

    }

    public function down(){

        $this->dbforge->drop_table('client_address');

    }

}