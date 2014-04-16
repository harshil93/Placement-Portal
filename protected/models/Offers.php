<?php

/**
 * This is the model class for table "offers".
 *
 * The followings are the available columns in table 'offers':
 * @property integer $st_id
 * @property integer $c_id
 * @property integer $j_id
 * @property string $joining_date
 * @property string $ppo
 * @property string $location
 * @property string $accepted
 * @property string $offer_deadline
 * @property string $tstamp
 *
 * The followings are the available model relations:
 * @property JobProfile $j
 * @property Company $c
 * @property Student $st
 */
class Offers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'offers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('st_id, c_id, j_id, ppo, offer_deadline, tstamp', 'required'),
			array('st_id, c_id, j_id', 'numerical', 'integerOnly'=>true),
			array('ppo, accepted', 'length', 'max'=>1),
			array('location', 'length', 'max'=>50),
			array('joining_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('st_id, c_id, j_id, joining_date, ppo, location, accepted, offer_deadline, tstamp', 'safe', 'on'=>'search'),
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
			'j' => array(self::BELONGS_TO, 'JobProfile', 'j_id'),
			'c' => array(self::BELONGS_TO, 'Company', 'c_id'),
			'st' => array(self::BELONGS_TO, 'Student', 'st_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'st_id' => 'St',
			'c_id' => 'C',
			'j_id' => 'J',
			'joining_date' => 'Joining Date',
			'ppo' => 'Ppo',
			'location' => 'Location',
			'accepted' => 'Accepted',
			'offer_deadline' => 'Offer Deadline',
			'tstamp' => 'Tstamp',
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

		$criteria->compare('st_id',$this->st_id);
		$criteria->compare('c_id',$this->c_id);
		$criteria->compare('j_id',$this->j_id);
		$criteria->compare('joining_date',$this->joining_date,true);
		$criteria->compare('ppo',$this->ppo,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('accepted',$this->accepted,true);
		$criteria->compare('offer_deadline',$this->offer_deadline,true);
		$criteria->compare('tstamp',$this->tstamp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Offers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
