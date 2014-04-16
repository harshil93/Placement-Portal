<?php

/**
 * This is the model class for table "job_profile".
 *
 * The followings are the available columns in table 'job_profile':
 * @property integer $j_id
 * @property integer $ctc
 * @property string $cpi_cutoff
 * @property string $description
 * @property string $approved
 * @property string $tstamp
 * @property integer $c_id
 * @property string $deadline
 *
 * The followings are the available model relations:
 * @property Apply[] $applies
 * @property Comments[] $comments
 * @property Company $c
 * @property JobProfileBranches[] $jobProfileBranches
 * @property Offers[] $offers
 * @property SlotAlloted[] $slotAlloteds
 */
class JobProfile extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'job_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ctc, tstamp, c_id, deadline', 'required'),
			array('ctc, c_id', 'numerical', 'integerOnly'=>true),
			array('cpi_cutoff', 'length', 'max'=>3),
			array('description', 'length', 'max'=>500),
			array('approved', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('j_id, ctc, cpi_cutoff, description, approved, tstamp, c_id, deadline', 'safe', 'on'=>'search'),
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
			'applies' => array(self::HAS_MANY, 'Apply', 'j_id'),
			'comments' => array(self::HAS_MANY, 'Comments', 'j_id'),
			'c' => array(self::BELONGS_TO, 'Company', 'c_id'),
			'jobProfileBranches' => array(self::HAS_MANY, 'JobProfileBranches', 'j_id'),
			'offers' => array(self::HAS_MANY, 'Offers', 'j_id'),
			'slotAlloteds' => array(self::HAS_MANY, 'SlotAlloted', 'j_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'j_id' => 'J',
			'ctc' => 'Ctc',
			'cpi_cutoff' => 'Cpi Cutoff',
			'description' => 'Description',
			'approved' => 'Approved',
			'tstamp' => 'Tstamp',
			'c_id' => 'C',
			'deadline' => 'Deadline',
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

		$criteria->compare('j_id',$this->j_id);
		$criteria->compare('ctc',$this->ctc);
		$criteria->compare('cpi_cutoff',$this->cpi_cutoff,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('approved',$this->approved,true);
		$criteria->compare('tstamp',$this->tstamp,true);
		$criteria->compare('c_id',$this->c_id);
		$criteria->compare('deadline',$this->deadline,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return JobProfile the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
