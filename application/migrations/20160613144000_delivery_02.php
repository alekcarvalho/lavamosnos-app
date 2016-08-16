<?php

class Migration_delivery_02 extends CI_Migration{

    public function up(){

        $fields = array(
                      'name' => array(
                         'type' => 'VARCHAR',
                         'constraint' => '120',
                         'null' => true
                      ),
                      'email' => array(
                         'type' => 'VARCHAR',
                         'constraint' => '80',
                         'null' => true
                      ),
                      'clave' => array(
                         'type' => 'TEXT',
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

        $this->dbforge->add_column('delivery', $fields);

    }

    public function down(){

        $this->dbforge->drop_column('delivery', 'name');
        $this->dbforge->drop_column('delivery', 'email');
        $this->dbforge->drop_column('delivery', 'clave');
        $this->dbforge->drop_column('delivery', 'status');
        $this->dbforge->drop_column('delivery', 'dtUpdate');
        $this->dbforge->drop_column('delivery', 'dtRegister');
        
    }

}