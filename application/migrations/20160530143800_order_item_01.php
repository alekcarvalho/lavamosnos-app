<?php

class Migration_order_item_01 extends CI_Migration{

    public function up(){

        $this->dbforge->add_field(
           array(
              'idOrderItem' => array(
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

        $this->dbforge->add_key('idOrderItem', TRUE);
        $this->dbforge->create_table('order_item');

    }

    public function down(){

        $this->dbforge->drop_table('order_item');

    }

}