<?php

class Migration_laundry_address_02 extends CI_Migration{

    public function up(){

        $this->dbforge->add_column(
                                    'laundry_address',
                                    ['CONSTRAINT laundry_address_FK_laundry FOREIGN KEY (idLaundry) REFERENCES laundry (idLaundry)']
                                  );

    }

    public function down(){

        $this->dbforge->drop_column(
                                    'laundry_address',
                                    ['FOREIGN KEY laundry_address_FK_laundry']
                                  );
        
    }

}