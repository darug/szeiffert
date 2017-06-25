<?php

class m130722_072514_addColumn_user_table extends CDbMigration
{
	public function up()
	{
	}

	public function down()
	{
		echo "m130722_072514_addColumn_user_table does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	 A mezo viszzaallitasat az indokolja, hogy az osszes CRUD fajl és yii belso hivatkozasok hasznaljak 13.07.22. oDG.
	 */
	public function safeUp()
	{
	 		$this->dropColumn('user', 'title','string NOT NULL');
	}

	public function safeDown()
	{
	}

}