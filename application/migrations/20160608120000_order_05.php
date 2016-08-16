<?php

class Migration_order_05 extends CI_Migration{

    public function up(){

        $fields = array(
                      'obs' => array(
                         'type' => 'TEXT',
                         'null' => true,
                         'after' => 'qty'
                      )
                   );

        $this->dbforge->add_column('order', $fields);

    }

    public function down(){

        $this->dbforge->drop_column('order', 'obs');
        
    }

}