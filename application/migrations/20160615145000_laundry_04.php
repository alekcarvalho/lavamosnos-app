<?php

class Migration_laundry_04 extends CI_Migration{

    public function up(){

        $fields = array(
                      'remember' => array(
                         'type' => 'VARCHAR',
                         'constraint' => '32',
                         'null' => true,
                         'after' => 'status'
                      ),
                      'code_auth' => array(
                         'type' => 'TEXT',
                         'null' => true,
                         'after' => 'clave'
                      )
                   );

        $this->dbforge->add_column('laundry', $fields);

    }

    public function down(){

        $this->dbforge->drop_column('laundry', 'code_auth');
        $this->dbforge->drop_column('laundry', 'remember');
        
    }

}