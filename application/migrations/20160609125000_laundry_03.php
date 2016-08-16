<?php

class Migration_laundry_03 extends CI_Migration{

    public function up(){

        $fields = array(
                      'emailSecundary' => array(
                         'type' => 'VARCHAR',
                         'constraint' => '80',
                         'null' => true,
                         'after' => 'email'
                      ),
                   );

        $this->dbforge->add_column('laundry', $fields);

    }

    public function down(){

        $this->dbforge->drop_column('laundry', 'emailSecundary');

    }

}