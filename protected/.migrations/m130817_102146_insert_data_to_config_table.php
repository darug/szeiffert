<?php

class m130817_102146_insert_data_to_config_table extends CDbMigration
{
	public function up()
	{
		
		$this->insert('config', array(
			'item'		=>	'oldalnev',
			'value'		=>	'',
			'type'		=>	'text',
			'label'		=>	'Oldal név',
			'category'	=>	'Oldal'
		));
		$this->insert('config', array(
			'item'		=>	'domain',
			'value'		=>	'',
			'type'		=>	'text',
			'label'		=>	'Domain név',
			'category'	=>	'Oldal'
		));
		$this->insert('config', array(
			'item'		=>	'image_logo',
			'value'		=>	'',
			'type'		=>	'upload',
			'label'		=>	'Logó',
			'category'	=>	'Oldal'
		));
		$this->insert('config', array(
			'item'		=>	'favicon_logo',
			'value'		=>	'',
			'type'		=>	'file',
			'label'		=>	'Ikon (favicon)',
			'category'	=>	'Oldal'
		));
		$this->insert('config', array(
			'item'		=>	'telefonszam',
			'value'		=>	'',
			'type'		=>	'text',
			'label'		=>	'Telefonszám',
			'category'	=>	'Oldal'
		));
		$this->insert('config', array(
			'item'		=>	'fax',
			'value'		=>	'',
			'type'		=>	'text',
			'label'		=>	'Fax',
			'category'	=>	'Oldal'
		));
		$this->insert('config', array(
			'item'		=>	'irszam',
			'value'		=>	'',
			'type'		=>	'text',
			'label'		=>	'Irányítószám',
			'category'	=>	'Cím adatok'
		));
		$this->insert('config', array(
			'item'		=>	'varos',
			'value'		=>	'',
			'type'		=>	'text',
			'label'		=>	'Település',
			'category'	=>	'Cím adatok'
		));
		$this->insert('config', array(
			'item'		=>	'cim',
			'value'		=>	'',
			'type'		=>	'text',
			'label'		=>	'Utca, házszám',
			'category'	=>	'Cím adatok'
		));
		$this->insert('config', array(
			'item'		=>	'posta_irszam',
			'value'		=>	'',
			'type'		=>	'text',
			'label'		=>	'Irányítószám (postázási cím)',
			'category'	=>	'Cím adatok'
		));
		$this->insert('config', array(
			'item'		=>	'posta_varos',
			'value'		=>	'',
			'type'		=>	'text',
			'label'		=>	'Település (postázási cím)',
			'category'	=>	'Cím adatok'
		));
		$this->insert('config', array(
			'item'		=>	'posta_cim',
			'value'		=>	'',
			'type'		=>	'text',
			'label'		=>	'Utca, házszám (postázási cím)',
			'category'	=>	'Cím adatok'
		));
		$this->insert('config', array(
			'item'		=>	'email_admin',
			'value'		=>	'',
			'type'		=>	'text',
			'label'		=>	'Adminisztrátor email címe (értesítésekhez)',
			'category'	=>	'Email beállítások'
		));
		$this->insert('config', array(
			'item'		=>	'email_dev',
			'value'		=>	'',
			'type'		=>	'text',
			'label'		=>	'Fejlesztő email címe (teszteléshez)',
			'category'	=>	'Email beállítások'
		));
		$this->insert('config', array(
			'item'		=>	'email_oldal',
			'value'		=>	'',
			'type'		=>	'text',
			'label'		=>	'Weboldal email címe (kimenő levelek feladója)',
			'category'	=>	'Email beállítások'
		));
		$this->insert('config', array(
			'item'		=>	'email_oldal_nev',
			'value'		=>	'',
			'type'		=>	'text',
			'label'		=>	'Weboldal email megjelenítendő név',
			'category'	=>	'Email beállítások'
		));
		$this->insert('config', array(
			'item'		=>	'smtp_szerver',
			'value'		=>	'',
			'type'		=>	'text',
			'label'		=>	'SMTP szerver',
			'category'	=>	'Email beállítások'
		));
		$this->insert('config', array(
			'item'		=>	'smtp_port',
			'value'		=>	'',
			'type'		=>	'text',
			'label'		=>	'SMTP port',
			'category'	=>	'Email beállítások'
		));
		$this->insert('config', array(
			'item'		=>	'smtp_auth',
			'value'		=>	'',
			'type'		=>	'checkbox',
			'label'		=>	'SMTP autentikáció',
			'category'	=>	'Email beállítások'
		));
		$this->insert('config', array(
			'item'		=>	'smtp_felhasznalo',
			'value'		=>	'',
			'type'		=>	'text',
			'label'		=>	'SMTP felhasználói név',
			'category'	=>	'Email beállítások'
		));
		$this->insert('config', array(
			'item'		=>	'smtp_jelszo',
			'value'		=>	'',
			'type'		=>	'text',
			'label'		=>	'SMTP jelszó',
			'category'	=>	'Email beállítások'
		));
		$this->insert('config', array(
			'item'		=>	'animacio',
			'value'		=>	'1',
			'type'		=>	'checkbox',
			'label'		=>	'Animációk bekapcsolása az adminisztrációs felületen',
			'category'	=>	'Oldal beállítások'
		));
		$this->insert('config', array(
			'item'		=>	'szerviz',
			'value'		=>	'',
			'type'		=>	'checkbox',
			'label'		=>	'Szeviz üzemmód (a honlap elérhetetlenné válik a felhasználók számára!)',
			'category'	=>	'Oldal beállítások'
		));
		
	}

	public function down()
	{
		$this->truncateTable('config');
	}

}