<?php
/**
 * @class Uzenet tábla model osztálya
 * @brief uzenet tabla, amely a pirossal kiírandó határidős üzeneteket tartalmazza
 * 
 */
 
/**
 * This is the model class for table "uzenet".
 *
 * The followings are the available columns in table 'uzenet':
 * @property integer $id
 * @property string $uzenet
 * @property string $ervenyes
 * @property string $megjegyzes
 * @property integer $valid
 * @property integer $id_orvos
 * @property timestamp $lastmod
 */
class Uzenet extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Uzenet the static model class
	 */
	public $temp; 
	public $admin;
	public $fadmin;
	
	private $datum;
	
	public function __construct(){
	
		$this->initDatum();
	}
	public function initDatum(){
		$this->datum = date('Y-m-d');
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'uzenet';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uzenet, ervenyes', 'required', 'message' => '{attribute} kitöltése kötelező.'),
			array('valid', 'boolean'),
			array('uzenet, megjegyzes', 'length', 'max'=>254, 'tooLong' => '{attribute} értéke túl hosszú.'),
			array('id_orvos', 'numerical', 'integerOnly'=>true),
			array('ervenyes', 'date', 'format' => 'yyyy-MM-dd', 'message' => 'Nem megfelelő dátumformátum. Helyes formátum: ÉÉÉÉ-HH-NN'),
			array('lastmod','date', 'format'=>'yyyy-M-d H:m:s'),
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
			'uzenet' => 'Üzenet tartalma',
			'ervenyes' => 'Megjelenítési határidő',
			'megjegyzes' => 'Megjegyzés',
			'valid' => 'Érvényes',
			'id_orvos' => 'Orvos id-je',
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
		$criteria->compare('uzenet',$this->uzenet,true);
		$criteria->compare('ervenyes',$this->ervenyes,true);
		$criteria->compare('megjegyzes',$this->megjegyzes,true);
		$criteria->compare('valid',$this->valid);
		$criteria->compare('id_orvos',Yii::app()->params['orvos'],true,'=',false);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * @fn info() az orvoshoz tartó határidős üzentet adja vissza
	 * @return a legelső le nem járt határidejű üzenetet adja vissza
	 * 
	 */
	public function info()
 	{
		if($record = $this->find(array(
		    'condition'=>'ervenyes>:ervenyes AND id_orvos=:id_orvos',
		    'params'=>array(
		    ':ervenyes'=>$this->datum,
			':id_orvos'=>Yii::app()->params['orvos'])))){
			$info=$record->uzenet;
			return $info;
		}
		else{
			
			return false;
			
		}
	} 
}/** @} */