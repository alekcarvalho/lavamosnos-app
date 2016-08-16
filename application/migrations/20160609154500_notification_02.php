<?php

class Migration_notification_02 extends CI_Migration{

    public function up(){

        $fields = array(
                      'idOrder' => array(
                         'type' => 'BIGINT',
                         'null' => true,
                         'after' => 'message'
                      )
                   );
        $this->dbforge->add_column('notification', $fields);

    }

    public function down(){

        $this->dbforge->drop_column('notification', 'idOrder');

    }

}