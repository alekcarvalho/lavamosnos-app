<?php

class Migration_client_billing_02 extends CI_Migration{

    public function up(){

        $this->dbforge->add_column(
                                    'client_billing',
                                    ['CONSTRAINT client_billing_FK_client FOREIGN KEY (idClient) REFERENCES client (idClient)']
                                  );

    }

    public function down(){

        $this->dbforge->drop_column(
                                    'client_billing',
                                    ['FOREIGN KEY client_billing_FK_client']
                                  );

    }

}