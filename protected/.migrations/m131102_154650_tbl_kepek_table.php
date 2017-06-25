<?php

class m131102_154650_tbl_kepek_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('tbl_kepek', array(
			'id'	=>	'pk',
			'kepek'	=>	'string NOT NULL',
			'szoveg'	=>	'string NOT NULL',
			'rovid_leiras'	=>	'string',
			'fajta' => 'string',
			'meret' => 'decimal',
			'mertel_egyseg' => 'string'
			
		));
	}

	public function down()
	{
		$this->dropTable('tbl_kepek');
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