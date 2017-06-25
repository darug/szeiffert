<?php

class m130720_095414_drop_column_url_from_content_table extends CDbMigration
{
	public function up()
	{
		
		$this->dropColumn('content', 'url');
		
	}

}