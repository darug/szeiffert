<?php

class m130919_142157_column_rename_kapcsolat_table extends CDbMigration
{
	public function up()
	{
		$this->renameColumn('kapcsolat', 'title', 'subject');
		$this->renameColumn('kapcsolat', 'uzenet', 'body');
	}

	public function down()
	{
		$this->renameColumn('kapcsolat', 'subject', 'title');
		$this->renameColumn('kapcsolat', 'body', 'uzenet');
	}

}