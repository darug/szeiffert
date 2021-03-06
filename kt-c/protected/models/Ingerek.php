<?php

/**
 * This is the model class for table "ingerek".
 *
 * The followings are the available columns in table 'ingerek':
 * @property integer $id
 * @property integer $inger_hossz
 * @property string $inger
 * @property integer $inger_typ
 * @property string $megjegyzes
 * @property string $lastmod
 */
class Ingerek extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ingerek the static model class
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
		return 'ingerek';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('inger_hossz, inger, inger_typ, megjegyzes, lastmod', 'required'),
			array('inger_hossz, inger_typ', 'numerical', 'integerOnly'=>true),
			array('inger', 'length', 'max'=>8),
			array('megjegyzes', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, inger_hossz, inger, inger_typ, megjegyzes, lastmod', 'safe', 'on'=>'search'),
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
			'inger_hossz' => 'Inger Hossz',
			'inger' => 'Inger',
			'inger_typ' => 'Inger Typ',
			'megjegyzes' => 'Megjegyzes',
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
		$criteria->compare('inger_hossz',$this->inger_hossz);
		$criteria->compare('inger',$this->inger,true);
		$criteria->compare('inger_typ',$this->inger_typ);
		$criteria->compare('megjegyzes',$this->megjegyzes,true);
		$criteria->compare('lastmod',$this->lastmod,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}