<?php

/**
 *  @class config0 modell
 * @brief az adott orvos config tartalmát ebből építi fel az epit action
 * 
 * This is the model class for table "config0".
 *
 * The followings are the available columns in table 'config0':
 * @property integer $id
 * @property string $item
 * @property string $value
 * @property string $type
 * @property string $label
 * @property string $category
 * @property integer $id_orvos
 */
class Config0 extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Config0 the static model class
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
		return 'config0';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_orvos', 'numerical', 'integerOnly'=>true),
			array('item, value, type, label, category', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, item, value, type, label, category, id_orvos', 'safe', 'on'=>'search'),
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
			'item' => 'Item',
			'value' => 'Value',
			'type' => 'Type',
			'label' => 'Label',
			'category' => 'Category',
			'id_orvos' => 'Id Orvos',
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
		$criteria->compare('label',$this->label,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('id_orvos',$this->id_orvos);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}