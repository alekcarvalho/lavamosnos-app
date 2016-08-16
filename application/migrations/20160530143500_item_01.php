<?php

class Migration_item_01 extends CI_Migration{

    public function up(){

        $this->dbforge->add_field(
           array(
              'idItem' => array(
                 'type' => 'BIGINT',
                 'unsigned' => true,
                 'auto_increment' => true
              )
           )
        );

        $this->dbforge->add_key('idItem', TRUE);
        $this->dbforge->create_table('item');

    }

    public function down(){

        $this->dbforge->drop_table('item');

    }

}