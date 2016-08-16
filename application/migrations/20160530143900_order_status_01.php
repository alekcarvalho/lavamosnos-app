<?php

class Migration_order_status_01 extends CI_Migration{

    public function up(){

        $this->dbforge->add_field(
           array(
              'idOrderStatus' => array(
                 'type' => 'BIGINT',
                 'unsigned' => true,
                 'auto_increment' => true
              ),
              'idOrder' => array(
                 'type' => 'BIGINT',
                 'unsigned' => true,
              ),
           )
        );

        $this->dbforge->add_key('idOrderStatus', TRUE);
        $this->dbforge->create_table('order_status');

    }

    public function down(){

        $this->dbforge->drop_table('order_status');

    }

}