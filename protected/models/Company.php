<?php

/**
 * This is the model class for table "company".
 *
 * The followings are the available columns in table 'company':
 * @property integer $c_id
 * @property string $name
 * @property string $details
 * @property string $phone_no
 * @property string $email_id
 *
 * The followings are the available model relations:
 * @property Apply[] $applies
 * @property Comments[] $comments
 * @property Login $c
 * @property JobProfile[] $jobProfiles
 * @property JobProfileBranches[] $jobProfileBranches
 * @property Offers[] $offers
 * @property Slots[] $slots
 * @property RecruiterDetails[] $recruiterDetails
 * @property SlotAlloted[] $slotAlloteds
 */
class Company extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'company';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('c_id, name, phone_no, email_id', 'required'),
			array('c_id', 'numerical', 'integerOnly'=>true),
			array('name, email_id', 'length', 'max'=>50),
			array('details', 'length', 'max'=>1000),
			array('phone_no', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('c_id, name, details, phone_no, email_id', 'safe', 'on'=>'search'),
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
			'applies' => array(self::HAS_MANY, 'Apply', 'c_id'),
			'comments' => array(self::HAS_MANY, 'Comments', 'c_id'),
			'c' => array(self::BELONGS_TO, 'Login', 'c_id'),
			'jobProfiles' => array(self::HAS_MANY, 'JobProfile', 'c_id'),
			'jobProfileBranches' => array(self::HAS_MANY, 'JobProfileBranches', 'c_id'),
			'offers' => array(self::HAS_MANY, 'Offers', 'c_id'),
			'slots' => array(self::MANY_MANY, 'Slots', 'ppt_slots(c_id, slot_id)'),
			'recruiterDetails' => array(self::HAS_MANY, 'RecruiterDetails', 'c_id'),
			'slotAlloteds' => array(self::HAS_MANY, 'SlotAlloted', 'c_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'c_id' => 'C',
			'name' => 'Name',
			'details' => 'Details',
			'phone_no' => 'Phone No',
			'email_id' => 'Support Email',
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

		$criteria->compare('c_id',$this->c_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('details',$this->details,true);
		$criteria->compare('phone_no',$this->phone_no,true);
		$criteria->compare('email_id',$this->email_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Company the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
