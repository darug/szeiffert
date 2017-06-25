<?php

/**
 * This is the model class for table "data_sum".
 *
 * The followings are the available columns in table 'data_sum':
 * @property integer $id
 * @property integer $id_user
 * @property integer $inger_szelesseg
 * @property tinyint(1) $mertyp
 * @property integer $mestime
 * @property integer $inger_start
 * @property integer $inger_lepes
 * @property integer $id_eredm
 * @property integer $inger_szam
 * @property integer $ri
 * @property integer $szoras
 * @property integer $cf
 * @property integer $ff
 * @property integer $tcorr
 * @property string $megjegyzes
 * @property string $lastmod
 */
class DataSum extends CActiveRecord
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
		return 'data_sum';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user, inger_szelesseg, inger_start, inger_lepes, id_eredm, inger_szam, ri, szoras, cf, ff, tcorr, megjegyzes, lastmod', 'required'),
			array('id_user, inger_szelesseg, inger_start, inger_lepes, id_eredm, inger_szam, ri, szoras, cf, ff, tcorr, mestime, mestyp', 'numerical', 'integerOnly'=>true),
			array('megjegyzes', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_user, inger_szelesseg, inger_start, inger_lepes, id_eredm, inger_szam, ri, szoras, cf, ff, tcorr, megjegyzes, lastmod', 'safe', 'on'=>'search'),
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
			'id_user' => 'Id User',
			'inger_szelesseg' => 'Inger Szelesseg',
			'mertyp'=> 'Mérés tipusa 1=valódi',
			'mestime'=>'Kijelzési idő',
			'inger_start' => 'Inger Start',
			'inger_lepes' => 'Inger Lépés',
			'id_eredm' => 'Id Eredm',
			'inger_szam' => 'Inger Szám',
			'ri' => 'Ri',
			'szoras' => 'Szórás',
			'cf' => 'Cf',
			'ff' => 'Ff',
			'tcorr' => 'Tcorr',
			'megjegyzes' => 'Megjegyzés',
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
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('inger_szelesseg',$this->inger_szelesseg);
		$criteria->compare('inger_start',$this->inger_start);
		$criteria->compare('inger_lepes',$this->inger_lepes);
		$criteria->compare('id_eredm',$this->id_eredm);
		$criteria->compare('inger_szam',$this->inger_szam);
		$criteria->compare('ri',$this->ri);
		$criteria->compare('szoras',$this->szoras);
		$criteria->compare('cf',$this->cf);
		$criteria->compare('ff',$this->ff);
		$criteria->compare('tcorr',$this->tcorr);
		$criteria->compare('megjegyzes',$this->megjegyzes,true);
		$criteria->compare('lastmod',$this->lastmod,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}