<?php

class Migration_order_detail_05 extends CI_Migration{

    public function up(){

        $fields = array(
                      'obs' => array(
                         'type' => 'TEXT',
                         'null' => true,
                         'after' => 'image'
                      )
                   );

        $this->dbforge->add_column('order_detail', $fields);

    }

    public function down(){

        $this->dbforge->drop_column('order_detail', 'obs');
        
    }

}