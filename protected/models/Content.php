<?php
/**
 * @class Content modell
 * \brief content tábla tárolja az összes statikus oldal tartalmat. 
 * 
 * This is the model class for table "content".
 * 
 * Az ÁLLANDÓ $name tarlamak:
 *  - home -> nyitó oldal,
 *  - home0 -> összegző oldal, amennyiben az orvosnak nem kell a honlap,
 *  - rendelesiidi/rendelesiido -> rendelési időoldal meghívó sora, nem szabad változtani rajta!!!
 *  - beteghirado -> iDG saját szövege,
 *  - rendido -> rendeléshez tartozó egyedi információk
 * 
 *
 * The followings are the available columns in table 'content':
 * @property integer $id
 * @property string $url
 * @property string $name
 * @property string $title
 * @property string $descrption
 * @property string $content
 * @property integer $noindex
 * @property integer $is_active
 * @property integer $contact_finish
 * @property string $temp // atmeneti tarolo
 * @property boolen $admin //false, ha a user->autority <90
 * @property integer $id_orvos
 * @property integer $szak_megnvezes
 * @property timestamp $lastmod
 */
class Content extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Content the static model class
	 */
	public $temp; 		/**< átmeneti tároló */
	public $admin;		
	public $fadmin;
	public $orvos;		/**< orvos id vagy nlv tárolására */
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'content';
	}
 	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, name', 'required', 'message' => '{attribute} kitöltése kötelező.'),
	//		array('title', 'unique', 'on' => array('insert', 'update'), 'message' => '{attribute} Ilyen érték már szerepel az adatbázisban.'),
	//	ha kiveszem, hiba nelkul lefut!10.18. oDG	array('name', 'createUrl', 'on' => array('insert', 'update')),
			array('noindex, is_active, contact_finish', 'boolean'),
			array('title, name, szak_megnevezes', 'length', 'max'=>254, 'tooLong' => '{attribute} értéke túl hosszú.'),
			array('descrption', 'length', 'max'=>254, 'tooLong' => '{attribute} értéke túl hosszú.'),
			array('id_orvos', 'numerical', 'integerOnly'=>true),
			array('lastmod','date', 'format'=>'yyyy-M-d H:m:s'),
			array('content', 'safe'),
			array('id, name, title, description, content, noindex,  is_active, contact_finish, id_orvos, szak_megnevezes', 'safe', 'on'=>'search'),
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
			'name' => 'Név (url)',
			'title' => 'Cím',
			'descrption' => 'Leírás (SEO)',
			'content' => 'Tartalom',
			'noindex' => 'Keresőrobotok tiltása',
			'is_active' => 'Aktív',
			'contact_finish' => 'Kapcsolat céloldal',
			'id_orvos' => 'Orvos id-je',
			'szak_megnevezes' => 'Szak megnevezése'
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
		$criteria->compare('name',$this->name,true,'=',false);
		$criteria->compare('noindex',$this->noindex,true,'=',false);
		$criteria->compare('is_active',$this->is_active,true,'=',false);
		$criteria->compare('contact_finish',$this->contact_finish,true,'=',false);
		$criteria->compare('id_orvos',Yii::app()->params['orvos'],true,'=',false);
	//	$criteria->compare('id_orvos',$this->id_orvos,true,'=',false);
		$criteria->compare('szak_megnevezes',$this->szak_megnevezes,true,'=',false);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
/** @} */