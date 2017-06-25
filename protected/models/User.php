<?php
/**
 * Ez a "user" tábla model osztálya
 * 
 */

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'admin':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $authority
 * @property string $lastmod
 * @property integer $rememberMe
 * @property string $id_orvos
 * @property string $id_rendelo
 * @property timestamp lastmod
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
			array('username, password', 'required'),
			array('authority, rememberMe', 'boolean'),
			array('username', 'length', 'max'=>64),
			array('password,title, id_orvos, id_rendelo', 'length', 'max'=>255),
		//	array('username, password', 'required'),
			array('password', 'authenticate', 'on' => 'login'),
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
			'username'=>'Felhasználói név:',
			'password'=>'Jelszó:',
			'rememberMe'=>'Emlékezz rám',
			'title' => 'Leírás',
			'authority' => 'Jogosultság (0 vagy 1)',
			'lastmod' => 'Utolsó módosítás ideje',
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

}/** @} */