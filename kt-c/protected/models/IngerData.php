<?php

/**
 * This is the model class for table "inger_data".
 *
 * The followings are the available columns in table 'inger_data':
 * @property integer $id
 * @property integer $id_user
 * @property integer $inger_szelesseg
 * @property integer $inger_start
 * @property integer $inger_lepes
 * @property integer $id_eredm
 * @property integer $inger_szam
 * @property integer $ri
 * @property integer $ch
 * @property integer $fh
 * @property integer $tcorr
 * @property string $megjegyzes
 * @property string $lastmod
 */
class IngerData extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return IngerData the static model class
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
		return 'inger_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user, inger_szelesseg, inger_start, inger_lepes, id_eredm, inger_szam, ri, ch, fh, tcorr, megjegyzes, lastmod', 'required'),
			array('id_user, inger_szelesseg, inger_start, inger_lepes, id_eredm, inger_szam, ri, ch, fh, tcorr', 'numerical', 'integerOnly'=>true),
			array('megjegyzes', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_user, inger_szelesseg, inger_start, inger_lepes, id_eredm, inger_szam, ri, ch, fh, tcorr, megjegyzes, lastmod', 'safe', 'on'=>'search'),
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
			'inger_start' => 'Inger Start',
			'inger_lepes' => 'Inger Lepes',
			'id_eredm' => 'Id Eredm',
			'inger_szam' => 'Inger Szam',
			'ri' => 'Ri',
			'ch' => 'Ch',
			'fh' => 'Fh',
			'tcorr' => 'Tcorr',
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
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('inger_szelesseg',$this->inger_szelesseg);
		$criteria->compare('inger_start',$this->inger_start);
		$criteria->compare('inger_lepes',$this->inger_lepes);
		$criteria->compare('id_eredm',$this->id_eredm);
		$criteria->compare('inger_szam',$this->inger_szam);
		$criteria->compare('ri',$this->ri);
		$criteria->compare('ch',$this->ch);
		$criteria->compare('fh',$this->fh);
		$criteria->compare('tcorr',$this->tcorr);
		$criteria->compare('megjegyzes',$this->megjegyzes,true);
		$criteria->compare('lastmod',$this->lastmod,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}