<?php

class Migration_order_detail_03 extends CI_Migration{

    public function up(){

        $fields = array(
                      'idOrderItem' => array(
                         'type' => 'BIGINT',
                         'unsigned' => true
                      ),
                      'brand' => array(
                         'type' => 'VARCHAR',
                         'constraint' => '20',
                         'unsigned' => true
                      ),
                      'type' => array(
                         'type' => 'BIGINT',
                         'unsigned' => true
                      ),
                      'image' => array(
                         'type' => 'VARCHAR',
                         'constraint' => '50',
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

        $this->dbforge->add_column('order_detail', $fields);

    }

    public function down(){

        $this->dbforge->drop_column('order_detail', 'idOrderItem');
        $this->dbforge->drop_column('order_detail', 'brand');
        $this->dbforge->drop_column('order_detail', 'type');
        $this->dbforge->drop_column('order_detail', 'image');
        $this->dbforge->drop_column('order_detail', 'status');
        $this->dbforge->drop_column('order_detail', 'dtUpdate');
        $this->dbforge->drop_column('order_detail', 'dtRegister');
        
    }

}