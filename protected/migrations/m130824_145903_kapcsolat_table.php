<?php

class m130824_145903_kapcsolat_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('kapcsolat', array(
			'id'	=>	'pk',
			'name'	=>	'string not NULL',
			'title'	=>	'string not NULL',
			'email'	=>	'string not NULL',
			'uzenet' => 'text',
		));
	}

	public function down()
	{
		return false;$this->dropTable('kapcsolat');
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