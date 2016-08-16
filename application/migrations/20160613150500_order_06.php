<?php

class Migration_order_06 extends CI_Migration{

    public function up(){

        $fields = array(
                      'idDelivery' => array(
                         'type' => 'BIGINT',
                         'unsigned' => true,
                         'after' => 'idLaundry'
                      )
                   );

        $this->dbforge->add_column('order', $fields);

    }

    public function down(){

        $this->dbforge->drop_column('order', 'idDelivery');
        
    }

}