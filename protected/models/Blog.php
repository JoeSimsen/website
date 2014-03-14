<?php

/**
 * This is the model class for table "blog".
 *
 * The followings are the available columns in table 'blog':
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $categorie_id
 */
class Blog extends CActiveRecord
{
	private $_image;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Blog the static model class
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
		return 'blog';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, intro, content', 'required'),
			array('title', 'length', 'max'=>250),
			array('image_src', 'file', 'types'=>'jpg, jpeg, png', 'allowEmpty' => true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, date_created, intro, title, content, image_src, categorie, long', 'safe'),
			array('image', 'length', 'max' => 255, 'tooLong' => '{attribute} is too long (max {max} chars).', 'on' => 'upload'),
			array('image', 'file', 'types' => 'jpg,jpeg,gif,png', 'maxSize' => 1024 * 1024 * 2, 'tooLarge' => 'Size should be less then 2MB !!!', 'on' => 'upload'),
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
	
	public function getImage()
	{
		if (!$this->_image)
		{
			$value = file_get_contents($this->getImageUrl());
			$this->setImage($value);
		}
		return $this->_image;
	}

	public function setImage($value)
	{
		$this->_image = $value;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'date_created' => 'Aanmaak datum',
			'title' => 'Title',
			'intro' => 'Intro',
			'content' => 'Content',
			'categorie' => 'Categorie',
			'long' => 'Langer blokje?',
		);
	}
	
	public function getImageUrl($long = false)
	{
		$pos=strrpos($this->image_src,'.');
		$name = (string)substr($this->image_src, 0, $pos);
		$ext = (string)substr($this->image_src, $pos+1);
		
		if ($long)
			$name = $name.'_long.'.$ext;
		else 
			$name = $name.'_thumb.'.$ext;
		
		return Yii::app()->request->getBaseUrl(true).DIRECTORY_SEPARATOR.'upload'.DIRECTORY_SEPARATOR.$name;
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('date_created', $this->date_created);
		$criteria->compare('title', $this->title,true);
		$criteria->compare('intro', $this->intro,true);
		$criteria->compare('content', $this->content,true);
		$criteria->compare('categorie', $this->categorie);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
	
	public function beforeSave()
	{
		if($this->isNewRecord) // only if adding new record
		{
			if($this->hasAttribute('date_created')) // if model have createdDate Field
				$this->date_created = new CDbExpression('NOW()'); // set createdDate value
		}
	
		return parent::beforeSave();
	}
}