<?php

class m130731_135038_change_korzet extends CDbMigration
{
	public function up()
	{
		//utca text tipusu volt es a kotelezo kitoltes is hianyzott 
		$this->dropColumn('korzet','utca'); 
		$this->addColumn('korzet','utca','string NOT NULL');
	}

	public function down()
	{
		echo "m130731_135038_change_korzet does not support migration down.\n";
		return false;
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