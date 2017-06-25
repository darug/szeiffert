<?php

class m130720_120340_uzenet extends CDbMigration
{
	public function up()
	{
		$this->createTable('uzenet', array(
					'id'			=>	'pk',
					'uzenet'		=>	'string NOT NULL',
					'ervenyes'		=>	'date',
					'megjegyzes'	=>	'string',
					'valid'			=>	'boolean'
			));
	}

	public function down()
	{
		$this->dropTable('uzenet');
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