<?php

class m131113_163032_orvos_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('orvos', array(
			'id'				=>	'pk',
			'name'				=>	'string NOT NULL',
			'sub_link'				=>	'string NOT NULL',
			'id_rendelo'		=>	'integer',
			'megjegyzes'			=>	'string',
		));
	}

	public function down()
	{
		$this->dropTable('orvos');
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