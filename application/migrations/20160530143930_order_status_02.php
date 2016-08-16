<?php

class Migration_order_status_02 extends CI_Migration{

    public function up(){

        $this->dbforge->add_column(
                                    'order_status',
                                    ['CONSTRAINT order_status_FK_order FOREIGN KEY (idOrder) REFERENCES `order` (idOrder)']
                                  );

    }

    public function down(){

        $this->dbforge->drop_column(
                                    'order_status',
                                    ['FOREIGN KEY order_status_FK_order']
                                  );

    }

}