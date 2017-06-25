<?php

class m131113_165018_addColunm_config_table extends CDbMigration
{
	public function up()
	{
		$this->addColumn('config','id_orvos','integer');
		$this->addColumn('content','id_orvos','integer');
		$this->addColumn('contact','id_orvos','integer');
		$this->addColumn('felvilagosit','id_orvos','integer');
		$this->addColumn('kapcsolat','id_orvos','integer');
		$this->addColumn('korzet','id_orvos','integer');
		$this->addColumn('rendido','id_orvos','integer');
		$this->addColumn('tbl_kepek','id_orvos','integer');
		$this->addColumn('user','id_orvos','integer');
		$this->addColumn('uzenet','id_orvos','integer');
	}

	public function down()
	{
		$this->dropColumn('config','id_orvos');
		$this->dropColumn('content','id_orvos');
		$this->dropColumn('contact','id_orvos');
		$this->dropColumn('felvilagosit','id_orvos');
		$this->dropColumn('kapcsolat','id_orvos');
		$this->dropColumn('korzet','id_orvos');
		$this->dropColumn('rendido','id_orvos');
		$this->dropColumn('tbl_kepek','id_orvos');
		$this->dropColumn('user','id_orvos');
		$this->dropColumn('uzenet','id_orvos');
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