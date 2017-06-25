<?php
/**
 * @class Rendido tábla model osztálya, amely a rendelési időket tartalmazza.
 * @brief Rendedido tabla a rendelési időket tartalmazza, egy orvoshoz fixen 14 db. rekord tartozik.
 */

/**
 * This is the model class for table "rendido".
 * 
 * The followings are the available columns in table 'rendido':
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $start
 * @property string $stop
 * @property string $comment
 * @property int(11) $id_orvos
 * @property tinyint(1) $oszlop_ki
 * @property timestamp $lastmod
 */
class Rendido extends CActiveRecord
{
	 /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Rendido the static model class
	 */
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	function getRendido(){
		
		
		
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'rendido';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, title', 'required','message' => '{attribute} kitöltése kötelező.'),
			array('name, title, start, stop, comment', 'length', 'max'=>255),
			array('id_orvos', 'numerical', 'integerOnly'=>true),
			array('oszlop_ki', 'boolean'),
			array('lastmod','date', 'format'=>'yyyy-M-d H:m:s'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, title, start, stop, comment, id_orvos', 'safe', 'on'=>'search'),
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
			'start' => 'Start',
			'stop' => 'Stop',
			'comment' => 'Comment',
			'id_orvos' => 'Orvos id-je',
			'oszlok_ki' => 'Oszlop megjelenés kikapcsolása',
		);
	}

	/**
	 * Feltölti a protected valtozokat a rendido adatbázisból és a content rendido recordból vett érttékekkel
	 */
	 public function rendertek(){
	 	
	 	
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
		$criteria->compare('start',$this->start,true);
		$criteria->compare('stop',$this->stop,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('id_orvos',Yii::app()->params['orvos'],true,'=',false);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
 	} 
}