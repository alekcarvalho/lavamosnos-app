<?php

class Migration_order_detail_02 extends CI_Migration{

    public function up(){

        $this->dbforge->add_column(
                                    'order_detail',
                                    ['CONSTRAINT order_detail_FK_order FOREIGN KEY (idOrder) REFERENCES `order` (idOrder)']
                                  );

    }

    public function down(){

        $this->dbforge->drop_column(
                                    'order_detail',
                                    ['FOREIGN KEY order_detail_FK_order']
                                  );

    }

}