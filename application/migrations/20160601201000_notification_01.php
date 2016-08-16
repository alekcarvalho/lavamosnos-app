<?php

class Migration_notification_01 extends CI_Migration{

    public function up(){

        $this->dbforge->add_field(
           array(
              'idNotification' => array(
                 'type' => 'BIGINT',
                 'unsigned' => true,
                 'auto_increment' => true
              ),
              'idUser' => array(
                 'type' => 'BIGINT',
                 'unsigned' => true,
                 'null' => true
              ),
              'userType' => array(
                 'type' => 'VARCHAR',
                 'constraint' => '8',
                 'unsigned' => true,
                 'null' => true
              ),
              'message' => array(
                 'type' => 'VARCHAR',
                 'constraint' => '240',
                 'unsigned' => true,
                 'null' => true
              ),
              'dtRegister TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
           )
        );

        $this->dbforge->add_key('idNotification', TRUE);
        $this->dbforge->create_table('notification');

    }

    public function down(){

        $this->dbforge->drop_table('notification');

    }

}