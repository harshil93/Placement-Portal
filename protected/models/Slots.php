<?php

/**
 * This is the model class for table "slots".
 *
 * The followings are the available columns in table 'slots':
 * @property integer $slot_id
 * @property string $room_no
 * @property string $start_time
 * @property string $end_time
 *
 * The followings are the available model relations:
 * @property Company[] $companies
 * @property SlotAlloted[] $slotAlloteds
 */
class Slots extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'slots';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('room_no, start_time, end_time', 'required'),
			array('slot_id', 'numerical', 'integerOnly'=>true),
			array('room_no', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('slot_id, room_no, start_time, end_time', 'safe', 'on'=>'search'),
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
			'companies' => array(self::MANY_MANY, 'Company', 'ppt_slots(slot_id, c_id)'),
			'slotAlloteds' => array(self::HAS_MANY, 'SlotAlloted', 'slot_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'slot_id' => 'Slot',
			'room_no' => 'Room No',
			'start_time' => 'Start Time',
			'end_time' => 'End Time',
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

		$criteria->compare('slot_id',$this->slot_id);
		$criteria->compare('room_no',$this->room_no,true);
		$criteria->compare('start_time',$this->start_time,true);
		$criteria->compare('end_time',$this->end_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Slots the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
