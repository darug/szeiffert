<?php

class m130813_123651_add_columns_label_category_to_config extends CDbMigration
{
	public function up()
	{
		
		$this->addColumn('config', 'label', 'string');
		$this->addColumn('config', 'category', 'string');
		
	}

	public function down()
	{
		
		$this->dropColumn('config', 'label');
		$this->dropColumn('config', 'string');
		
	}

}