<?php

class Migration_order_item_03 extends CI_Migration{

    public function up(){

        $fields = array(
                      'idType' => array(
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

        $this->dbforge->add_column('order_item', $fields);

    }

    public function down(){

        $this->dbforge->drop_column('order_item', 'idType');
        $this->dbforge->drop_column('order_item', 'qty');
        $this->dbforge->drop_column('order_item', 'status');
        $this->dbforge->drop_column('order_item', 'dtUpdate');
        $this->dbforge->drop_column('order_item', 'dtRegister');
        
    }

}