<?php

class m130813_072446_create_config_table extends CDbMigration
{
	public function up()
	{
		
		$this->createTable('config', array(
			'id'	=>	'pk',
			'item'	=>	'string',
			'value'	=>	'string',
			'type'	=>	'string'
		));
		
	}

	public function down()
	{
		
		$this->dropTable('config');

	}

}