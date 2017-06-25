<?php
/**
 * Ez a "orvosform1" tábla model osztálya
 * 
 */
 
/**
 * This is the model class for table "orvosform1".
 *
 * The followings are the available columns in table 'orvosform1':
 * @property integer $id
 * @property integer $l_hasznos
 * @property integer $l_ertheto
 * @property integer $h_hasznos
 * @property integer $h_attekint
 * @property integer $h_celszeru
 * @property string $h_hiany
 * @property string $h_legjobb
 * @property string $h_kimaradt
 * @property string $h_felesleg
 * @property string $megjegyzes
 * @property string $kitoltve
 */
class Orvosform1 extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Orvosform1 the static model class
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
		return 'orvosform1';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		//	array('kitoltve', 'required'),
			array('l_hasznos, l_ertheto, h_hasznos, h_attekint, h_celszeru', 'numerical', 'integerOnly'=>true, min=>1, max=>5),
			array('h_hiany, h_legjobb, h_kimaradt, h_felesleg, megjegyzes', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, l_hasznos, l_ertheto, h_hasznos, h_attekint, h_celszeru, h_hiany, h_legjobb, h_kimaradt, h_felesleg, megjegyzes, lastmod', 'safe', 'on'=>'search'),
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
			'l_hasznos' => 'Lépésről-lépésre segédlet hasznossága (1=nagyon gyenge, 2=gyenge, 3=közepes, 4=jó, 5=igen jó)',
			'l_ertheto' => 'Lépésről-lépésre segédlet érthetősége (1=nagyon gyenge, 2=gyenge, 3=közepes, 4=jó, 5=igen jó)',
			'h_hasznos' => 'Honlap hasznossága (1=nagyon gyenge, 2=gyenge, 3=közepes, 4=jó, 5=igen jó)',
			'h_attekint' => 'Honlap áttekinthetősége (1=nagyon gyenge, 2=gyenge, 3=közepes, 4=jó, 5=igen jó)',
			'h_celszeru' => 'Honlap célszerűsége (1=nagyon gyenge, 2=gyenge, 3=közepes, 4=jó, 5=igen jó)',
			'h_hiany' => 'Mi hiányzik a honlapról?',
			'h_legjobb' => 'Mi a legjobb a honlapon?',
			'h_kimaradt' => 'id_orvos',
			'h_felesleg' => 'Mi felesleges a honlapon?',
			'megjegyzes' => 'Megjegyzes',
			'lastmod' => 'Kitoltve',
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
		$criteria->compare('l_hasznos',$this->l_hasznos);
		$criteria->compare('l_ertheto',$this->l_ertheto);
		$criteria->compare('h_hasznos',$this->h_hasznos);
		$criteria->compare('h_attekint',$this->h_attekint);
		$criteria->compare('h_celszeru',$this->h_celszeru);
		$criteria->compare('h_hiany',$this->h_hiany,true);
		$criteria->compare('h_legjobb',$this->h_legjobb,true);
		$criteria->compare('h_kimaradt',$this->h_kimaradt,true);
		$criteria->compare('h_felesleg',$this->h_felesleg,true);
		$criteria->compare('megjegyzes',$this->megjegyzes,true);
		$criteria->compare('kitoltve',$this->kitoltve,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}/** @} */