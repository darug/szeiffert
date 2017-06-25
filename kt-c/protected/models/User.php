<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $title
 * @property string $veznev
 * @property string $kernev
 * @property string $password
 * @property string $nem
 * @property string $szul_datum
 * @property string $csapat
 * @property string $kategoria
 * @property integer $authority
 * @property integer $rememberMe
 * @property string $id_old
 * @property integer $inger_szelesseg
 * @property integer $inger_szam
 * @property integer $mestime
 * @property integer $pausetime
 * @property integer $mesnum
 * @property integer $mini
 * @property integer $maxi
 * @property integer $atlag
 * @property string $lastmod
 */
class User extends CActiveRecord
{
	public $temp; 
	public $admin;
	
	private $_identity;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, username, title, veznev, kernev, password, nem, szul_datum, kategoria, authority, inger_szam, ', 'required'),
			array('id, authority, rememberMe, inger_szelesseg, inger_szam, mestime, pausetime, mestyp, mesnum, mini, maxi, atlag', 'numerical', 'integerOnly'=>true),
			array('username, title', 'length', 'max'=>64),
			array('veznev', 'length', 'max'=>32),
			array('kernev', 'length', 'max'=>24),
			array('password', 'length', 'max'=>255),
			array('csapat','length', 'max'=>64),
			array('nem', 'length', 'max'=>10),
			array('kategoria', 'length', 'max'=>12),
			array('id_old', 'length', 'max'=>11),
			array('lastmod', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, title, veznev, kernev, password, nem, szul_datum, kategoria, authority, rememberMe, id_old, inger_szelesseg, inger_szam, mestime, pausetime, mesnum, mini, maxi, atlag, lastmod', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'title' => 'Title',
			'veznev' => 'Veznev',
			'kernev' => 'Kernev',
			'password' => 'Password',
	//		'salt'=>'Salt',
	//		'strategy'=>'Strategy',
			'nem' => 'Nem',
			'szul_datum' => 'Szul Datum',
			'csapat'=>'Csapat',
			'kategoria' => 'Kategoria',
			'authority' => 'Authority',
			'rememberMe' => 'Remember Me',
			'id_old' => 'Id Old',
			'inger_szelesseg' => 'Karakterszám',
			'inger_szam' => 'Inger Szam',
			'mestime' => 'Mestime',
			'pausetime' => 'Pausetime',
			'mesnum' => 'Mesnum',
			'mestyp' => 'tanuló=,valódi=1',
			'mini' => 'Mini',
			'maxi' => 'Maxi',
			'atlag' => 'Atlag',
			'lastmod' => 'Lastmod',
		);
	}
	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}

/** @} */
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('veznev',$this->veznev,true);
		$criteria->compare('kernev',$this->kernev,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('nem',$this->nem,true);
		$criteria->compare('szul_datum',$this->szul_datum,true);
		$criteria->compare('csapat',$this->csapat,true);
		$criteria->compare('kategoria',$this->kategoria,true);
		$criteria->compare('authority',$this->authority,true);
		$criteria->compare('rememberMe',$this->rememberMe);
		$criteria->compare('id_old',$this->id_old,true);
		$criteria->compare('inger_szelesseg',$this->inger_szelesseg);
		$criteria->compare('inger_szam',$this->inger_szam);
		$criteria->compare('mestime',$this->mestime);
		$criteria->compare('pausetime',$this->pausetime);
		$criteria->compare('mesnum',$this->mesnum);
		$criteria->compare('mestyp',$this->mestyp);
		$criteria->compare('mini',$this->mini);
		$criteria->compare('maxi',$this->maxi);
		$criteria->compare('atlag',$this->atlag);
		$criteria->compare('lastmod',$this->lastmod,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}