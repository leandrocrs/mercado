<?php
class Migration_Adiciona_vendido_ao_produto extends CI_Migration 
{
    public function up() 
    {
    	$this->dbforge->add_column('produtos', array(
            'vendido' => array(
                'type' => 'boolean',
                'default' => '0'
            )
        ));
    }

    public function down() 
    {
    	$this->dbforge->drop_column('produtos', 'vendido');
    }
}