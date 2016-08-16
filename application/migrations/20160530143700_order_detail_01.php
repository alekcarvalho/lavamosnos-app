<?php

class Migration_order_detail_01 extends CI_Migration{

    public function up(){

        $this->dbforge->add_field(
           array(
              'idOrderDetail' => array(
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

        $this->dbforge->add_key('idOrderDetail', TRUE);
        $this->dbforge->create_table('order_detail');

    }

    public function down(){

        $this->dbforge->drop_table('order_detail');

    }

}