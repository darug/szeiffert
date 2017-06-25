<?php
/**
 * @class Rendelo tábla model osztálya
 * @brief Rendelők adatainak táblája, ennek id-je kerül az orvos->rendelo mezőbe
 * 
 */
 
 
/**
 * This is the model class for table "rendelo".
 *
 * The followings are the available columns in table 'rendelo':
 * @property integer $id
 * @property integer $irszam
 * @property string $varos
 * @property string $cim
 * @property string $telefon
 * @property string $email
 * @property string $rend_nev
 * @property integer $orvos_szam
 * @property string $megjegyzes
 * @property integer $lastmod
 */
class Rendelo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Rendelo the static model class
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
		return 'rendelo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('irszam, varos, cim, rend_nev', 'required'),
			array('irszam, orvos_szam ','numerical', 'integerOnly'=>true),
			array('varos, cim, telefon, email, rend_nev, megjegyzes', 'length', 'max'=>255),
			array('lastmod','date', 'format'=>'yyyy-M-d H:m:s'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, irszam, varos, cim, telefon, email, rend_nev, orvos_szam, megjegyzes', 'safe', 'on'=>'search'),
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
			'irszam' => 'Ir.szám',
			'varos' => 'Város',
			'cim' => 'Cím',
			'telefon' => 'Telefon',
			'email' => 'Email',
			'rend_nev' => 'Rendelő Neve',
			'orvos_szam' => 'Orvos Szám',
			'megjegyzes' => 'Megjegyzés',
			'lastmod' => 'Utolsó módosítás',
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
		$criteria->compare('irszam',$this->irszam);
		$criteria->compare('varos',$this->varos,true);
		$criteria->compare('cim',$this->cim,true);
		$criteria->compare('telefon',$this->telefon,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('rend_nev',$this->rend_nev,true);
		$criteria->compare('orvos_szam',$this->orvos_szam);
		$criteria->compare('megjegyzes',$this->megjegyzes,true);
		$criteria->order='rend_nev';
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}