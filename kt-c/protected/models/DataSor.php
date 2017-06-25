<?php

/**
 * This is the model class for table "data_sor".
 *
 * The followings are the available columns in table 'data_sor':
 * @property integer $id
 * @property integer $id_data_sum
 * @property integer $inger_typ
 * @property integer $m_time
 * @property integer $cf
 * @property integer $ff
 * @property string $lastmod
 */
class DataSor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DataSor the static model class
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
		return 'data_sor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_data_sum, m_time, lastmod', 'required'),
			array('id_data_sum, inger_typ, m_time, cf, ff', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_data_sum, inger_typ, m_time, cf, ff, lastmod', 'safe', 'on'=>'search'),
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
			'id_data_sum' => 'Id Data Sum',
			'inger_typ' => 'Inger tipus',
			'm_time' => 'M Time',
			'cf' => 'Cf',
			'ff' => 'Ff',
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
		$criteria->compare('id_data_sum',$this->id_data_sum);
		$criteria->compare('inger_typ',$this->inger_typ);
		$criteria->compare('m_time',$this->m_time);
		$criteria->compare('cf',$this->cf);
		$criteria->compare('ff',$this->ff);
		$criteria->compare('lastmod',$this->lastmod,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}