<?php

class m130720_100448_drop_columns_from_user extends CDbMigration
{

	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		
		$this->dropColumn('user', 'salt');
		$this->dropColumn('user', 'srtategy');
		$this->dropColumn('user', 'title');
		$this->dropColumn('user', 'remembering');
		
	}
	
}