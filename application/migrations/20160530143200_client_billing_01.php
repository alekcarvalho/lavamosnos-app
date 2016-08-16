<?php

class Migration_client_billing_01 extends CI_Migration{

    public function up(){

        $this->dbforge->add_field(
           array(
              'idClientBilling' => array(
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

        $this->dbforge->add_key('idClientBilling', TRUE);
        $this->dbforge->create_table('client_billing');

    }

    public function down(){

        $this->dbforge->drop_table('client_billing');

    }

}