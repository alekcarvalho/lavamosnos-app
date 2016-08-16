<?php

class Migration_order_item_02 extends CI_Migration{

    public function up(){

        $this->dbforge->add_column(
                                    'order_item',
                                    ['CONSTRAINT order_item_FK_order FOREIGN KEY (idOrder) REFERENCES `order` (idOrder)']
                                  );

    }

    public function down(){

        $this->dbforge->drop_column(
                                    'order_item',
                                    ['FOREIGN KEY order_item_FK_order']
                                  );

    }

}