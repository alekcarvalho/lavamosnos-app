<?php

class Migration_laundry_01 extends CI_Migration{

    public function up(){

        $this->dbforge->add_field(
           array(
              'idLaundry' => array(
                 'type' => 'BIGINT',
                 'unsigned' => true,
                 'auto_increment' => true
              )
           )
        );

        $this->dbforge->add_key('idLaundry', TRUE);
        $this->dbforge->create_table('laundry');

    }

    public function down(){

        $this->dbforge->drop_table('laundry');

    }

}