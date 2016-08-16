<?php

class Migration_client_02 extends CI_Migration{

    public function up(){

        $fields = array(
                      'idFacebook' => array(
                         'type' => 'BIGINT',
                         'null' => true
                      ),
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
                      'phone' => array(
                         'type' => 'VARCHAR',
                         'constraint' => '14',
                         'null' => true
                      ),
                      'mobile' => array(
                         'type' => 'VARCHAR',
                         'constraint' => '15',
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
        $this->dbforge->add_column('client', $fields);

    }

    public function down(){

        $this->dbforge->drop_column('client', 'idFacebook');
        $this->dbforge->drop_column('client', 'name');
        $this->dbforge->drop_column('client', 'email');
        $this->dbforge->drop_column('client', 'clave');
        $this->dbforge->drop_column('client', 'phone');
        $this->dbforge->drop_column('client', 'mobile');
        $this->dbforge->drop_column('client', 'status');
        $this->dbforge->drop_column('client', 'dtUpdate');
        $this->dbforge->drop_column('client', 'dtRegister');

    }

}