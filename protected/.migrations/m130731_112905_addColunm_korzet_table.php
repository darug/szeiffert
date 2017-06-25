<?php

class m130731_112905_addColunm_korzet_table extends CDbMigration
{
	public function up()
	{
		$this->addColumn('korzet','kezdo_szam_paros','string');
		$this->addColumn('korzet','veg_szam_paros','string');
		$this->dropColumn('korzet','kezdo_szam');
		$this->dropColumn('korzet','veg_szam'); 
		$this->addColumn('korzet','kezdo_szam_paratlan','string');
		$this->addColumn('korzet','veg_szam_paratlan','string');
	}

	public function down()
	{
		$this->dropColumn('korzet','kezdo_szam_paros');
		$this->dropColumn('korzet','veg_szam_paros');
		$this->dropColumn('korzet','kezdo_szam_paratlan');
		$this->dropColumn('korzet','veg_szam_paratlan');
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