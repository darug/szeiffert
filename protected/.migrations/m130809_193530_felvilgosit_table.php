<?php

class m130809_193530_felvilgosit_table extends CDbMigration
{
	public function up()
	{
		
		$this->createTable('felvilagosit', array(
			'id'				=>	'pk',
			'name'				=>	'string NOT NULL',
			'title'				=>	'string NOT NULL',
			'link'		=>	'string',
			'rovid'			=>	'string',
			'hosszu'			=>	'text',
			'megjegyzes'			=>	'string',
		));
		
	}

	public function down()
	{
		$this->dropTable('content');
	}

}