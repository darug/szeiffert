<?php

class m131114_113510_rendelo_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('rendelo', array(
			'id'				=>	'pk',
			'irszam'			=>	'integer NOT NULL',
			'varos'				=>	'string NOT NULL',
			'cim'				=>	'string NOT NULL',
			'telefon'			=>	'string NOT NULL',
			'email'				=>	'string NOT NULL',
			'rend_nev'			=>	'string NOT NULL',
			'orvos_szam'		=>	'integer',
			'megjegyzes'		=>	'string',
		));
	}

	public function down()
	{
		$this->dropTable('rendelo');
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