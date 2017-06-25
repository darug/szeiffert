<?php

class m130604_123850_create_content_table extends CDbMigration
{
	public function up()
	{
		
		$this->createTable('content', array(
			'id'				=>	'pk',
			'name'				=>	'string NOT NULL',
			'title'				=>	'string NOT NULL',
			'descrption'		=>	'string NOT NULL',
			'content'			=>	'text',
			'noindex'			=>	'boolean',
			'is_active'			=>	'boolean',
			'contact_finish'	=>	'boolean'
		));
		
	}

	public function down()
	{
		$this->dropTable('content');
	}

}