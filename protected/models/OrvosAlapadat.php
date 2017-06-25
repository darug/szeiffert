<?php
/**
 * @class OrvosAlapadat model
 *  Ebbe a táblába kell beírni az alapadatokat, csak az "admin" számára hozzáférhető
 * @package OrvosAlapadat
 */
 
/**
 * This is the model class for table "orvos_alapadat".
 *
 * The followings are the available columns in table 'orvos_alapadat':
 * @property integer $id
 * @property string $Nev
 * @property string $Rendelo
 * @property string $telefon
 * @property string $hetfo
 * @property string $kedd
 * @property string $szerda
 * @property string $csutortok
 * @property string $pentek
 * @property string $pentek_paratlan
 * @property string $szak_megnevezes
 * @property string $status
 * @property string $s_honlap
 * @property string $megjegyzes
 * @property string $dname
 * @property timestamp $lastmod
 */
class OrvosAlapadat extends CActiveRecord
{
	public $count;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrvosAlapadat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'orvos_alapadat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'numerical', 'integerOnly'=>true),
			array('Nev', 'length', 'max'=>62),
			array('Rendelo', 'length', 'max'=>150),
			array('telefon', 'length', 'max'=>32),
			array('hetfo, kedd, szerda, csutortok, pentek, pentek_paratlan', 'length', 'max'=>24),
			array('szak_megnevezes, dname', 'length', 'max'=>255),
			array('s_honlap', 'length', 'max'=>29),
			array('megjegyzes', 'length', 'max'=>160),
			array('lastmod','date', 'format'=>'yyyy-M-d H:m:s'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Nev, Rendelo, telefon, hetfo, kedd, szerda, csutortok, pentek, pentek_paratlan, szak_megnevezes, s_honlap, megjegyzes', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Nev' => 'Nev',
			'Rendelo' => 'Rendelo',
			'telefon' => 'Telefon',
			'hetfo' => 'Hetfo',
			'kedd' => 'Kedd',
			'szerda' => 'Szerda',
			'csutortok' => 'Csutortok',
			'pentek' => 'Pentek',
			'pentek_paratlan' => 'Pentek Paratlan',
			'szak_megnevezes' => "Szakterület",
			's_honlap' => 'S Honlap',
			'megjegyzes' => 'Megjegyzes',
			'dname' => 'Domain név'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('Nev',$this->Nev,true);
		$criteria->compare('Rendelo',$this->Rendelo,true);
		$criteria->compare('telefon',$this->telefon,true);
		$criteria->compare('hetfo',$this->hetfo,true);
		$criteria->compare('kedd',$this->kedd,true);
		$criteria->compare('szerda',$this->szerda,true);
		$criteria->compare('csutortok',$this->csutortok,true);
		$criteria->compare('pentek',$this->pentek,true);
		$criteria->compare('pentek_paratlan',$this->pentek_paratlan,true);
		$criteria->compare('szak_megnevezes',$this->szak_megnevezes,true);
		$criteria->compare('s_honlap',$this->s_honlap,true);
		$criteria->compare('megjegyzes',$this->megjegyzes,true);
		$criteria->compare('szak_megnevezes',$this->szak_megnevezes,true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}/** @} */