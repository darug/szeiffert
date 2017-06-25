<?php

/**
 * This is the model class for table "felvilagosit0".
 *
 * The followings are the available columns in table 'felvilagosit0':
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $link
 * @property string $rovid
 * @property string $hosszu
 * @property string $megjegyzes
 * @property integer $id_orvos
 * @property string $szak_megnevezes
 * @property integer $irszam
 */
class Felvilagosit0 extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Felvilagosit0 the static model class
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
		return 'felvilagosit0';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, title, irszam', 'required'),
			array('id_orvos, irszam', 'numerical', 'integerOnly'=>true),
			array('name, title, link, rovid, megjegyzes, szak_megnevezes', 'length', 'max'=>255),
			array('hosszu', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, title, link, rovid, hosszu, megjegyzes, id_orvos, irszam, szak_megnevezes', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'title' => 'Title',
			'link' => 'Link',
			'rovid' => 'Rovid',
			'hosszu' => 'Hosszu',
			'megjegyzes' => 'Megjegyzes',
			'id_orvos' => 'Id Orvos',
			'irszam' => 'Irszam',
			'szak_megnevezes' => 'Szakterület',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('rovid',$this->rovid,true);
		$criteria->compare('hosszu',$this->hosszu,true);
		$criteria->compare('megjegyzes',$this->megjegyzes,true);
		$criteria->compare('id_orvos',$this->id_orvos);
		$criteria->compare('irszam',$this->irszam);
		$criteria->compare('szak_megnevezes',$this->szak_megnevezes);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}