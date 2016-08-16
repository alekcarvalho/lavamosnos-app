<?php

class Migration_laundry_address_01 extends CI_Migration{

    public function up(){

        $this->dbforge->add_field(
                array(
                  'idLaundryAddress' => array(
                     'type' => 'BIGINT',
                     'unsigned' => true,
                     'auto_increment' => true
                  ),
                  'idLaundry' => array(
                     'type' => 'BIGINT',
                     'unsigned' => true,
                     'unique' => TRUE
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
                  'range' => array(
                     'type' => 'VARCHAR',
                     'constraint' => '10',
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
            )
        );

        $this->dbforge->add_key('idLaundryAddress', TRUE);
        $this->dbforge->create_table('laundry_address');

    }

    public function down(){

        $this->dbforge->drop_table('laundry_address');
        
    }

}