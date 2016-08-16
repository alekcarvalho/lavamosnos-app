<?php

class Migration_delivery_04 extends CI_Migration{

    public function up(){

        $fields = array(
                      'code_auth' => array(
                         'type' => 'TEXT',
                         'null' => true,
                         'after' => 'clave'
                      )
                   );

        $this->dbforge->add_column('delivery', $fields);

    }

    public function down(){

        $this->dbforge->drop_column('delivery', 'code_auth');
        
    }

}