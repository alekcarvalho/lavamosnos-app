<?php

class Migration_laundry_02 extends CI_Migration{

    public function up(){

        $fields = array(
                      'name' => array(
                         'type' => 'VARCHAR',
                         'constraint' => '120',
                         'null' => true
                      ),
                      'cnpj' => array(
                         'type' => 'VARCHAR',
                         'constraint' => '18',
                         'null' => true
                      ),
                      'email' => array(
                         'type' => 'VARCHAR',
                         'constraint' => '80',
                         'null' => true
                      ),
                      'imagem' => array(
                         'type' => 'VARCHAR',
                         'constraint' => '80',
                         'null' => true
                      ),
                      'phone' => array(
                         'type' => 'VARCHAR',
                         'constraint' => '14',
                         'null' => true
                      ),
                      'clave' => array(
                         'type' => 'TEXT',
                         'null' => true
                      ),
                      'status' => array(
                         'type' => 'TINYINT',
                         'constraint' => '1',
                         'default' => 2
                      ),
                      'dtUpdate TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
                      'dtRegister' => array(
                         'type' => 'DATETIME',
                         'null' => true
                      )
                   );

        $this->dbforge->add_column('laundry', $fields);

    }

    public function down(){

        $this->dbforge->drop_column('laundry', 'cnpj');
        $this->dbforge->drop_column('laundry', 'name');
        $this->dbforge->drop_column('laundry', 'email');
        $this->dbforge->drop_column('laundry', 'clave');
        $this->dbforge->drop_column('laundry', 'phone');
        $this->dbforge->drop_column('laundry', 'imagem');
        $this->dbforge->drop_column('laundry', 'status');
        $this->dbforge->drop_column('laundry', 'dtUpdate');
        $this->dbforge->drop_column('laundry', 'dtRegister');

    }

}