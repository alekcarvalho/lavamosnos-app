<?php

class Migration_log_01 extends CI_Migration{

    public function up(){

        $this->dbforge->add_field(
           array(
              'idLog' => array(
                 'type' => 'BIGINT',
                 'unsigned' => true,
                 'auto_increment' => true
              )
           )
        );

        $this->dbforge->add_key('idLog', TRUE);
        $this->dbforge->create_table('log');

    }

    public function down(){

        $this->dbforge->drop_table('log');

    }

}