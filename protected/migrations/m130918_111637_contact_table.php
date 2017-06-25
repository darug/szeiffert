<?php

class m130918_111637_contact_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('contact', array(
			'id'	=>	'pk',
			'name'	=>	'string not NULL',
			'title'	=>	'string not NULL',
			'email'	=>	'string not NULL',
			'subject' => 'string not null',
			'body' => 'text not NULL',
		));
	}

	public function down()
	{
		return false;$this->dropTable('contact');
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