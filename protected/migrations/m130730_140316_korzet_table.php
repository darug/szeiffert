<?php

class m130730_140316_korzet_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('korzet', array(
			'id'				=>	'pk',
			'name'				=>	'string NOT NULL',
			'title'				=>	'string NOT NULL',
			'irszam'			=>	'integer',
			'utca'				=>	'text',
			'kezdo_szam'		=>	'string',
			'veg_szam'			=>	'string',
			'megjegyzes'		=>	'string'
		));
		
	}

	public function down()
	{
		$this->dropTable('korzet');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}