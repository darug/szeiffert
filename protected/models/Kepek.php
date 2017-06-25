<?php
/**
 * @class  Kepek tábla model osztálya
 * @brief Ez a tábla a képek linkjét, megnevezését és egyébb adatait tartalmazza
 * 
 */
/**
 * This is the model class for table "tbl_kepek".
 *
 * The followings are the available columns in table 'tbl_kepek':
 * @property integer $id
 * @property string $kep
 * @property string $szoveg
 * @property string $rovid_leiras
 * @property string $fajta
 * @property string $meret
 * @property string $mertek_egyseg
 * @property integer $id_orvos
 */
class Kepek extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Kepek the static model class
	*/
	public $uzenet; // szoveges uzenet
	public $ft;  //logikai valtozo
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_kepek';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kep, szoveg, rovid_leiras, fajta',  'required'),
			array('kep, fajta', 'length', 'max'=>64),
			array('szoveg', 'length', 'max'=>128),
			array('rovid_leiras', 'length', 'max'=>250),
			array('meret', 'length', 'max'=>4),
			array('mertek_egyseg', 'length', 'max'=>160),
			array('id_orvos', 'numerical', 'integerOnly'=>true),
			array('lastmod','date', 'format'=>'yyyy-M-d H:m:s'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kep, szoveg, rovid_leiras, fajta, meret, mertek_egyseg', 'safe', 'on'=>'search'),
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
			'kep' => 'Kép fájl neve',
			'szoveg' => 'Szöveg a kép azonosítására',
			'rovid_leiras' => 'Rövid leírás',
			'fajta' => 'Kategória',
			'meret' => 'Linkek száma',
			'mertek_egyseg' => 'Megjegyzés',
			'id_orvos' => 'Orvos id-je', 
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
		$criteria->compare('kep',$this->kep,true);
		$criteria->compare('szoveg',$this->szoveg,true);
		$criteria->compare('rovid_leiras',$this->rovid_leiras,true);
		$criteria->compare('fajta',$this->fajta,true);
		$criteria->compare('meret',$this->meret,true);
		$criteria->compare('mertek_egyseg',$this->mertek_egyseg,true);
		$criteria->compare('id_orvos',Yii::app()->params['orvos'],true,'=',false);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
/** @} */
}