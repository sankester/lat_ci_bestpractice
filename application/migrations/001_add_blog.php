<?php

/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 15/04/2017
 * Time: 09:37
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_Add_blog extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(
            array(
                'id' => array(
                    'type' => 'int',
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'pubdate' => array(
                    'type' => 'DATETIME'
                ),
                'title' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 100
                ),
                'text' => array(
                    'type' => 'TEXT'
                )
            )
        );

        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('blog', true);
    }

    public function down()
    {
        $this->dbforge->drop_table('blog', true);
    }
}