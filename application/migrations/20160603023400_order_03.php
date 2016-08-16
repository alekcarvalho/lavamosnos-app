<?php

class Migration_order_03 extends CI_Migration{

    public function up(){

        $this->dbforge->add_column(
                                    'order',
                                    ['CONSTRAINT order_FK_client FOREIGN KEY (idClient) REFERENCES client (idClient)']
                                  );

    }

    public function down(){

        $this->dbforge->drop_column(
                                    'order',
                                    ['FOREIGN KEY order_FK_client']
                                  );
        
    }

}