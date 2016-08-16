<?php

class Migration_order_08 extends CI_Migration{

    public function up(){

        $fields = array(
                      'statusDelivery' => array(
                         'type' => 'TINYINT',
                         'constraint' => '1',
                         'default' => 1,
                         'after' => 'status'
                      ),
                      'idClientAddress' => array(
                         'type' => 'BIGINT',
                         'unsigned' => true,
                         'null' => true,
                         'after' => 'idClient'
                      ),
                      'idLaundryAddress' => array(
                         'type' => 'BIGINT',
                         'unsigned' => true,
                         'null' => true,
                         'after' => 'idLaundry'
                      ),
                   );

        $this->dbforge->add_column('order', $fields);

        $this->dbforge->add_column(
                                    'order',
                                    ['CONSTRAINT order_FK_client_address FOREIGN KEY (idClientAddress) REFERENCES client_address (idClientAddress)']
                                  );

        $this->dbforge->add_column(
                                    'order',
                                    ['CONSTRAINT order_FK_laundry_address FOREIGN KEY (idLaundryAddress) REFERENCES laundry_address (idLaundryAddress)']
                                  );

    }

    public function down(){

        $this->dbforge->drop_column('order', 'statusDelivery');
        $this->dbforge->drop_column('order', 'idClientAddress');
        $this->dbforge->drop_column('order', 'idLaundryAddress');

        $this->dbforge->drop_column(
                                    'order',
                                    ['FOREIGN KEY order_FK_client_address']
                                  );

        $this->dbforge->drop_column(
                                    'order',
                                    ['FOREIGN KEY order_FK_laundry_address']
                                  );
        
    }

}