<?php

/**
 * @class Config model
 * @brief A config tábla az általános adatok tárolására szolgál (cím, számlázási cím, telefon, e-mail, stb.)
 *
 * @{The followings are the available columns in table 'config':
 *  - @var: integer $id
 *  - @var: string $item (pl: name, email, etc.)
 *  - @property: string $value 
 *  - @property: string $type  
 *  - @var: string $label kiírandó megnevezés
 *  - @var: string $category (oldal, email, etc.)
 *  - @property integer $id_orvos
 * 	- @var timestanp $lastmod
 * @}
 */
class Config extends CActiveRecord
{
	
	protected $attributeLabels = array();
	
	protected function afterFind ()
    {

        $this->attributeLabels = array(
			'value'			=>	$this->label,
		);

        parent::afterFind();
    }
	/**
	 * @fn getAllConfig
	 * @return Összes adatot adja vissza
	 */
	public static function getAllConfig(){
		
		return self::model()->findAll(array('index' => 'id', 'order' => 'category, id'));
		
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Config the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return $this->attributeLabels;
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'config';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('item, value, type', 'length', 'max'=>255),
			array('id_orvos', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, item, value, type, id_orvos', 'safe', 'on'=>'search'),
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
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('item',$this->item,true);
		$criteria->compare('value',$this->value,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('id_orvos',Yii::app()->params['orvos'],true,'=',false);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}