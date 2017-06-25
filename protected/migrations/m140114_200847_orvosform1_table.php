<?php

class m140114_200847_orvosform1_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('orvosform1', array(
			'id'				=>	'pk',
			'l_hasznos'			=>	'integer',
			'l_ertheto'			=>	'integer',
			'h_hasznos'			=>	'integer',
			'h_attekint'		=>	'integer',
			'h_celszeru'		=>	'integer',
			'h_hiany'			=>	'string',
			'h_legjobb'			=>	'string',
			'h_kimaradt'		=>	'string',
			'h_felesleg'		=>	'string',
			'megjegyzes'		=>	'string',
			'kitoltve'			=>	'timestamp',
		));
	}

	public function down()
	{
		$this->dropTable('orvosform1');
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