<?php

class Migration_order_01 extends CI_Migration{

    public function up(){

        $this->dbforge->add_field(
           array(
              'idOrder' => array(
                 'type' => 'BIGINT',
                 'unsigned' => true,
                 'auto_increment' => true
              )
           )
        );

        $this->dbforge->add_key('idOrder', TRUE);
        $this->dbforge->create_table('order');

    }

    public function down(){

        $this->dbforge->drop_table('order');

    }

}