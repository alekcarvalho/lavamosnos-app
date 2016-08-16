<?php

class Migration_delivery_03 extends CI_Migration{

    public function up(){

        $fields = array(
                      'remember' => array(
                         'type' => 'VARCHAR',
                         'constraint' => '32',
                         'null' => true,
                         'after' => 'status'
                      )
                   );

        $this->dbforge->add_column('delivery', $fields);

    }

    public function down(){

        $this->dbforge->drop_column('delivery', 'remember');
        
    }

}