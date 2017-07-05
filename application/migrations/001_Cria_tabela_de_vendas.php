<?php
class Migration_Cria_tabela_de_vendas extends CI_migration 
{
	public function up()
	{		
		$this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'auto_increment' => true
            ),
            'comprador_id' => array(
                'type' => 'INT'                
            ),
            'produto_id' => array(
                'type' => 'INT'
            ),
            'data_entrega' => array(
            	'type'=>'DATE'
            )
        ));

        $this->dbforge->add_key('id', true);
		$this->dbforge->create_table('vendas');
	}

	public function down()
	{
		$this->dbforge->drop_table('vendas');
	}
}