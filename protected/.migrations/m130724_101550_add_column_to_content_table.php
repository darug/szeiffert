<?php

class m130724_101550_add_column_to_content_table extends CDbMigration
{
	public function up()
	{
		
		$this->addColumn('content', 'url', 'string');
		
	}

	public function down()
	{
		
		$this->dropColumn('content', 'url');
		
	}

}