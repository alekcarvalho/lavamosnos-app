<?php

class Migration_client_address_02 extends CI_Migration{

    public function up(){

        $this->dbforge->add_column(
                                    'client_address',
                                    ['CONSTRAINT client_address_FK_client FOREIGN KEY (idClient) REFERENCES client (idClient)']
                                  );

    }

    public function down(){

        $this->dbforge->drop_column(
                                    'client_address',
                                    ['FOREIGN KEY client_address_FK_client']
                                  );
        
    }

}