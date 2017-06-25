<?php
/**
 *  @class Kapcsolat modell
 *
 * @brief Ez a "kapcsolat" tábla model osztálya, amely az orvosnak küldött üzeneteket tartalmazza.
 * 
 */
/**
 * This is the model class for table "kapcsolat".
 * A szokásos funkciókon kívül @fn config($item) az adott name=$item-hez tartozó adatot adja vissza
 * 
 * The followings are the available columns in table 'kapcsolat':
 * @property integer $id
 * @property string $name
 * @property string $subject
 * @property string $email
 * @property string $body
 * @property integer $id_orvos
 */
class Kapcsolat extends CActiveRecord
{
	
	public $verifyCode;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Kapcsolat the static model class
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
		return 'kapcsolat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, subject, email', 'required'),
			array('name, subject, email, email_to', 'length', 'max'=>255),
			array('id_orvos', 'numerical', 'integerOnly'=>true),
			array('body', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, subject, email, body, id_orvos', 'safe', 'on'=>'search'),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
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
			'name' => 'Küldő neve',
			'subject' => 'Tárgy',
			'email' => 'Email',
			'email_to'=>'Címzett emailje',
			'body' => 'Üzenet',
			'id_orvos' => 'Orvos id',
		);
	}
	/**
	 * Config tabla adott item-hez tartozo value-vel ter vissza 
	 * 2013.09.19 oDG
	 */
	 public function config($item){
	 	$config= new Config;
		 $record=$config->find('item=:item AND id_orvos=:id_orvos', array(
		 	':item'=> $item,
		 	':id_orvos'=> Yii::app()->params['orvos'],
		 ));
		 if($record){$value=$record->value;} else {$value=false;}
		 return $value;
		}
	 	/**
	 * Config tabla adott item-hez tartozo id-vel ter vissza 
	 * 2014.01.09 oDG
	 */
	 public function config_id($item){
	 	$config= new Config;
		 $record=$config->find('item=:item AND id_orvos=:id_orvos', array(
		 	':item'=> $item,
		 	':id_orvos'=> Yii::app()->params['orvos'],
		 ));
		 
		 return $record;
		}
	 /**
	  * @ return Cimmel ter vissza
	  * 2013.09.19 oDG
	  */
	  public function cim(){
	  	$cim=$this->config('irszam')." ".$this->config('varos')." ".$this->config('cim');
		return $cim;
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
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('id_orvos',Yii::app()->params['orvos'],true,'=',false);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}/** @} */