<?php

class Migration_order_04 extends CI_Migration{

    public function up(){

        $this->dbforge->add_column(
                                    'order',
                                    ['CONSTRAINT order_FK_laundry FOREIGN KEY (idLaundry) REFERENCES laundry (idLaundry)']
                                  );

    }

    public function down(){

        $this->dbforge->drop_column(
                                    'order',
                                    ['FOREIGN KEY order_FK_laundry']
                                  );
        
    }

}