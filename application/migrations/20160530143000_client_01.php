<?php

class Migration_client_01 extends CI_Migration{

    public function up(){

        $this->dbforge->add_field(
           array(
              'idClient' => array(
                 'type' => 'BIGINT',
                 'unsigned' => true,
                 'auto_increment' => true
              )
           )
        );

        $this->dbforge->add_key('idClient', TRUE);
        $this->dbforge->create_table('client');

    }

    public function down(){

        $this->dbforge->drop_table('client');

    }

}