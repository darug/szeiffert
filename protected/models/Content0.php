<?php

/**
 * This is the model class for table "content0".
 *
 * The followings are the available columns in table 'content0':
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $descrption
 * @property string $content
 * @property integer $noindex
 * @property integer $is_active
 * @property string $contact_finish
 * @property string $url
 * @property integer $id_orvos
 * @property string $szak_megnevezes
 * @property timestamp $lastmod
 */
class Content0 extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Content0 the static model class
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
		return 'content0';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, title, descrption', 'required'),
			array('noindex, is_active, id_orvos', 'numerical', 'integerOnly'=>true),
			array('name, title, descrption, contact_finish, url, szak_megnevezes', 'length', 'max'=>255),
			array('content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, title, descrption, content, noindex, is_active, contact_finish, url, id_orvos', 'safe', 'on'=>'search'),
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
			'descrption' => 'Descrption',
			'content' => 'Content',
			'noindex' => 'Noindex',
			'is_active' => 'Is Active',
			'contact_finish' => 'Contact Finish',
			'url' => 'Url',
			'id_orvos' => 'Id Orvos',
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
		$criteria->compare('descrption',$this->descrption,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('noindex',$this->noindex);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('contact_finish',$this->contact_finish,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('id_orvos',$this->id_orvos, TRUE);
		$criteria->compare('szak_megnevezes',$this->szak_megnevezes,TRUE);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}