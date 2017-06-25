<?php
/**
 * @class Orvos tábla model osztálya
 * @brief Orvosok táblája
 */
/**
 * This is the model class for table "orvos".
 *
 * The followings are the available columns in table 'orvos':
 * @property integer $id sorszám, a saját honlap ezt építi be a linkbe
 * @property string $name az orvos teljes neve (dr. Vezetéknév Keresztnév)
 * @property string $sub_link
 * @property integer $id_rendelo 
 * @property string $megjegyzes
 * @property string $layout	a kinézetet meghatározó fájl neve (alapeset: main)
 * @property string $orvos_megnev	szakirányú végzettség (házi-, gyermekorvos, stb. )
 * @property string $status
 * @property integer $lastmod
 */
class Orvos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Orvos the static model class
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
		return 'orvos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('id_rendelo', 'numerical', 'integerOnly'=>true),
			array('name, sub_link, megjegyzes, layout, orvos_megnev, status, dname', 'length', 'max'=>255),
			//array('lastmod','numerical','integerOnly'=>TRUE),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, sub_link, id_rendelo, orvos_megnev, status, megjegyzes', 'safe', 'on'=>'search'),
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
			'sub_link' => 'Sub Link',
			'id_rendelo' => 'Id Rendelo',
			'megjegyzes' => 'Megjegyzes',
			'orvos_megnev' => 'Orvos végzettsége',
			'status' => "Státusz",
			'dname' => "Domain név",
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

		$criteria->compare('id',Yii::app()->params['orvos'],true,'=',FALSE);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('sub_link',$this->sub_link,true);
		$criteria->compare('id_rendelo',$this->id_rendelo);
		$criteria->compare('megjegyzes',$this->megjegyzes,true);
		$criteria->compare('layout',$this->layout,true);
		$criteria->compare('orvos_megnev',$this->orvos_megnev,true);
		$criteria->compare('status',$this->status,true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
/**
 * rendezett keresés ..vieww/orvos/keres-ben használják
 */
 	public function search0()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		
		$criteria->compare('name',$this->name,true);
		$criteria->compare('sub_link',$this->sub_link,true);
		$criteria->compare('id_rendelo',$this->id_rendelo);
		$criteria->compare('megjegyzes',$this->megjegyzes,true);
		$criteria->compare('layout',$this->layout,true);
		$criteria->compare('orvos_megnev',$this->orvos_megnev,true);
		$criteria->compare('status',$this->status,true);
		$criteria->order='name';
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Honlapok státuszárol ad vissza név és szám információt!
	 */
	public function info()
 	{
		$sql='SELECT  DISTINCT `status`FROM `orvos` WHERE 1';
		$records=Yii::app()->db->createCommand($sql)->queryAll();
		$uzenet="Elkészült honlapok státusza: ";
		if($records){
			foreach ($records as $key=>$value) {
			    $n=Orvos::model()->count('status=:status AND dname=:dname',array(':status'=>$value['status'],
											':dname'=>$_SESSION['ho']['dname']));
				if($value['status']>" ")$uzenet.=$value['status']." ".$n." db, ";
			}
		}
		return $uzenet; 
	}
}/** @} */