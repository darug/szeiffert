<?php

class m131122_104136_reformetted_lastmod_user_table extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('user', 'lastmod');
		$this->addColumn('user','lastmod','integer');
	}

	public function down()
	{
		echo "m131122_104136_reformetted_lastmod_user_table does not support migration down.\n";
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