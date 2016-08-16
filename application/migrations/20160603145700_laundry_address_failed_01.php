<?php

class Migration_laundry_address_failed_01 extends CI_Migration{

    public function up(){

        $this->dbforge->add_field(
                array(
                  'idLaundryAddressFailed' => array(
                     'type' => 'BIGINT',
                     'unsigned' => true,
                     'auto_increment' => true
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
                  'dtUpdate TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
                  'dtRegister' => array(
                     'type' => 'DATETIME',
                     'null' => true
                  )
            )
        );

        $this->dbforge->add_key('idLaundryAddressFailed', TRUE);
        $this->dbforge->create_table('laundry_address_failed');

    }

    public function down(){

        $this->dbforge->drop_table('laundry_address_failed');
        
    }

}