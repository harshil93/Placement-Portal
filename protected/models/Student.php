<?php

/**
 * This is the model class for table "student".
 *
 * The followings are the available columns in table 'student':
 * @property integer $roll_no
 * @property integer $st_id
 * @property string $name
 * @property string $gender
 * @property string $cpi
 * @property string $dept
 * @property string $programme
 * @property string $category
 * @property string $phone_no
 * @property string $current_address
 * @property string $home_address
 *
 * The followings are the available model relations:
 * @property Apply[] $applies
 * @property Comments[] $comments
 * @property CvTable[] $cvTables
 * @property Offers[] $offers
 * @property SpiTable[] $spiTables
 * @property Login $st
 */
class Student extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('roll_no, name, cpi, dept, programme, category, current_address, home_address', 'required'),
			array('roll_no, st_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('gender', 'length', 'max'=>1),
			array('cpi, dept, category', 'length', 'max'=>3),
			array('programme', 'length', 'max'=>5),
			array('phone_no', 'length', 'max'=>10),
			array('current_address, home_address', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('roll_no, st_id, name, gender, cpi, dept, programme, category, phone_no, current_address, home_address', 'safe', 'on'=>'search'),
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
			'applies' => array(self::HAS_MANY, 'Apply', 'st_id'),
			'comments' => array(self::HAS_MANY, 'Comments', 'st_id'),
			'cvTables' => array(self::HAS_MANY, 'CvTable', 'st_id'),
			'offers' => array(self::HAS_MANY, 'Offers', 'st_id'),
			'spiTables' => array(self::HAS_MANY, 'SpiTable', 'st_id'),
			'st' => array(self::BELONGS_TO, 'Login', 'st_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'roll_no' => 'Roll No',
			'st_id' => 'St',
			'name' => 'Name',
			'gender' => 'Gender',
			'cpi' => 'Cpi',
			'dept' => 'Dept',
			'programme' => 'Programme',
			'category' => 'Category',
			'phone_no' => 'Phone No',
			'current_address' => 'Current Address',
			'home_address' => 'Home Address',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('roll_no',$this->roll_no);
		$criteria->compare('st_id',$this->st_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('cpi',$this->cpi,true);
		$criteria->compare('dept',$this->dept,true);
		$criteria->compare('programme',$this->programme,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('phone_no',$this->phone_no,true);
		$criteria->compare('current_address',$this->current_address,true);
		$criteria->compare('home_address',$this->home_address,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Student the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
