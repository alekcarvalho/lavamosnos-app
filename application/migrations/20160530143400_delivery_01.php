<?php

class Migration_delivery_01 extends CI_Migration{

    public function up(){

        $this->dbforge->add_field(
           array(
              'idDelivery' => array(
                 'type' => 'BIGINT',
                 'unsigned' => true,
                 'auto_increment' => true
              )
           )
        );

        $this->dbforge->add_key('idDelivery', TRUE);
        $this->dbforge->create_table('delivery');

    }

    public function down(){

        $this->dbforge->drop_table('delivery');

    }

}