<?php

/**
 * This is the model class for table "legjobb".
 *
 * The followings are the available columns in table 'data_sum':
 * @property integer $id
 * @property integer $inger_szelesseg
 * @property tnteger $tcorr
 * @property integer $cf
 * @property integer $ff
 * @property datetime $ido1
 * @property integer $id_data_sum
 * @property integer $mesnum
 * @property datetime $ido2
 * @property integer $id_data_sum2
 * @property timestamp $lastmod
 */
class Legjobb extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DataSum the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return CDbConnection database connection
	 */
	public function getDbConnection()
	{
		return Yii::app()->dbktc;
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'legjobb';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('id_user, inger_szelesseg, inger_start, inger_lepes, id_eredm, inger_szam, ri, szoras, cf, ff, tcorr, megjegyzes, lastmod', 'required'),
			array('id_user, inger_szelesseg, tcorr, cf, ff, id_data_sum, mesnum, cf, id_data_sum2', 'numerical', 'integerOnly'=>true),
			array('ido1,ido2,lastmod', 'datetime'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			//array('id, id_user, inger_szelesseg, inger_start, inger_lepes, id_eredm, inger_szam, ri, szoras, cf, ff, tcorr, megjegyzes, lastmod', 'safe', 'on'=>'search'),
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
			'inger_szelesseg' => 'Inger Szelesseg',
			'tcorr'=> 'Korrigált reakció idő',
			'cf'=>'jó inger hibaszám',
			'ff' => 'fals inger hibaszám',
			'ido1' => 'Mérés ideje',
			'id_data_sum' => 'A legjobb tcorr id_data_sum-ja',
			'mesnum' => 'A legnagyobb mérészám',
			'ido2' => 'Ennek időpontja',
			'id_data_sum2' => 'A legtöbb mérésszám id_data_sum-ja',
			'lastmod' => 'Lastmod',
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
		$criteria->compare('inger_szelesseg',$this->inger_szelesseg);
		$criteria->compare('inger_szelesseg',$this->inger_szelesseg);
		$criteria->compare('tcorr',$this->tcorr);
		$criteria->compare('cf',$this->cf);
		$criteria->compare('ff',$this->ff);
		$criteria->compare('ido1',$this->ido1);
		$criteria->compare('id_data_sum',$this->id_data_sum);
		$criteria->compare('mesnum',$this->mesnum);
		$criteria->compare('id2',$this->ido2);
		$criteria->compare('id_data_sum2',$this->id_data_sum2);
		$criteria->compare('lastmod',$this->lastmod,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}