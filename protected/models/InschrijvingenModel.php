<?php

/**
 * This is the model class for table "inschrijvingenmodel".
 *
 * The followings are the available columns in table 'inschrijvingenmodel':
 * @property integer $id
 * @property string $volledige_naam
 * @property string $tafel
 * @property string $allergieen
 * @property string $opmerkingen
 * @property integer $tafel_id
 *
 * The followings are the available model relations:
 * @property Tafelmodel $tafelmodel
 */
class InschrijvingenModel extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return InschrijvingenModel the static model class
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
		return 'inschrijvingenmodel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('volledige_naam, email, gang_2, gang_3, gang_4', 'required'),
			array('tafel_id', 'numerical', 'integerOnly'=>true),
			array('volledige_naam, email', 'length', 'max'=>100),
			array('allergieen, opmerkingen','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, volledige_naam, email, allergieen, opmerkingen, tafel_id,  gang_2, gang_3, gang_4', 'safe', 'on'=>'search'),
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
			'tafelModel' => array(self::HAS_ONE, 'TafelModel', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'volledige_naam' => 'Volledige naam',
			'email' => 'E-mailadres',
			'gang_2' => 'Gang 2',
			'gang_3' => 'Gang 3',
			'gang_4' => 'Gang 4',
			'allergieen' => 'Allergieen',
			'opmerkingen' => 'Opmerkingen',
			'tafel_id' => 'Tafel',
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
		$criteria->compare('volledige_naam',$this->volledige_naam,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('gang_2',$this->gang_2,true);
		$criteria->compare('gang_3',$this->gang_3,true);
		$criteria->compare('gang_4',$this->gang_4,true);
		$criteria->compare('allergieen',$this->allergieen,true);
		$criteria->compare('opmerkingen',$this->opmerkingen,true);
		$criteria->compare('tafel_id',$this->tafel_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getPrijs()
	{
		if ($this->gang_4 === 'dessert')
			return '16,00';
		else 
			return '17,00';
		
		return $prijs;
	}
}