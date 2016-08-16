<?php

class Migration_client_address_03 extends CI_Migration{

    public function up(){

        $fields = array(
                      'type' => array(
                         'type' => 'VARCHAR',
                         'constraint' => '10',
                         'null' => true
                      ),
                      'zipcode' => array(
                         'type' => 'VARCHAR',
                         'constraint' => '9',
                         'null' => true
                      ),
                      'address' => array(
                         'type' => 'VARCHAR',
                         'constraint' => '255',
                         'null' => true
                      ),
                      'number' => array(
                         'type' => 'VARCHAR',
                         'constraint' => '40',
                         'null' => true
                      ),
                      'complement' => array(
                         'type' => 'VARCHAR',
                         'constraint' => '90',
                         'null' => true
                      ),
                      'neighborhood' => array(
                         'type' => 'VARCHAR',
                         'constraint' => '50',
                         'null' => true
                      ),
                      'city' => array(
                         'type' => 'VARCHAR',
                         'constraint' => '50',
                         'null' => true
                      ),
                      'estate' => array(
                         'type' => 'CHAR',
                         'constraint' => '2',
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

        $this->dbforge->add_column('client_address', $fields);

    }

    public function down(){

        $this->dbforge->drop_column('client_address', 'type');
        $this->dbforge->drop_column('client_address', 'zipcode');
        $this->dbforge->drop_column('client_address', 'address');
        $this->dbforge->drop_column('client_address', 'cnpj');
        $this->dbforge->drop_column('client_address', 'number');
        $this->dbforge->drop_column('client_address', 'complement');
        $this->dbforge->drop_column('client_address', 'neighborhood');
        $this->dbforge->drop_column('client_address', 'city');
        $this->dbforge->drop_column('client_address', 'estate');
        $this->dbforge->drop_column('client_address', 'status');
        $this->dbforge->drop_column('client_address', 'dtUpdate');
        $this->dbforge->drop_column('client_address', 'dtRegister');
        
    }

}