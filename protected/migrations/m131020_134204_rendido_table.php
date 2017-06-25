<?php

class m131020_134204_rendido_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('rendido', array(
			'id'	=>	'pk',
			'name'				=>	'string NOT NULL',
			'title'				=>	'string NOT NULL',
			'start'	=>	'string',
			'stop' => 'string',
			'comment'	=>	'string'
		));
	}

	public function down()
	{
		$this->dropTable('rendido');
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