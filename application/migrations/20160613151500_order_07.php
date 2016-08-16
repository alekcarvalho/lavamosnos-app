<?php

class Migration_order_07 extends CI_Migration{

    public function up(){

        $this->dbforge->add_column(
                                    'order',
                                    ['CONSTRAINT order_FK_delivery FOREIGN KEY (idDelivery) REFERENCES delivery (idDelivery)']
                                  );

    }

    public function down(){

        $this->dbforge->drop_column(
                                    'order',
                                    ['FOREIGN KEY order_FK_delivery']
                                  );
        
    }

}