<?php

class Migration_order_02 extends CI_Migration{

    public function up(){

        $fields = array(
                      'idClient' => array(
                         'type' => 'BIGINT',
                         'unsigned' => true
                      ),
                      'idLaundry' => array(
                         'type' => 'BIGINT',
                         'unsigned' => true
                      ),
                      'qty' => array(
                         'type' => 'INT',
                         'null' => true
                      ),
                      'status' => array(
                         'type' => 'TINYINT',
                         'constraint' => '1',
                         'default' => 1
                      ),
                      'dtUpdate TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
                      'dtRegister' => array(
                         'type' => 'DATETIME',
                         'null' => true
                      )
                   );

        $this->dbforge->add_column('order', $fields);

    }

    public function down(){

        $this->dbforge->drop_column('order', 'idClient');
        $this->dbforge->drop_column('order', 'idLaundry');
        $this->dbforge->drop_column('order', 'qty');
        $this->dbforge->drop_column('order', 'status');
        $this->dbforge->drop_column('order', 'dtUpdate');
        $this->dbforge->drop_column('order', 'dtRegister');
        
    }

}