<?php

class Migration_order_detail_04 extends CI_Migration{

    public function up(){

        $this->dbforge->add_column(
                                    'order_detail',
                                    ['CONSTRAINT order_detail_FK_order_item FOREIGN KEY (idOrderItem) REFERENCES order_item (idOrderItem)']
                                  );

    }

    public function down(){

        $this->dbforge->drop_column(
                                    'order_detail',
                                    ['FOREIGN KEY order_detail_FK_order_item']
                                  );
        
    }

}