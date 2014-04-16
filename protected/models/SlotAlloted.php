<?php

/**
 * This is the model class for table "slot_alloted".
 *
 * The followings are the available columns in table 'slot_alloted':
 * @property integer $slot_id
 * @property integer $c_id
 * @property integer $j_id
 *
 * The followings are the available model relations:
 * @property Company $c
 * @property Slots $slot
 * @property JobProfile $j
 */
class SlotAlloted extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'slot_alloted';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('slot_id, c_id, j_id', 'required'),
			array('slot_id, c_id, j_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('slot_id, c_id, j_id', 'safe', 'on'=>'search'),
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
			'c' => array(self::BELONGS_TO, 'Company', 'c_id'),
			'slot' => array(self::BELONGS_TO, 'Slots', 'slot_id'),
			'j' => array(self::BELONGS_TO, 'JobProfile', 'j_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'slot_id' => 'Slot',
			'c_id' => 'C',
			'j_id' => 'J',
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
		$criteria->compare('c_id',$this->c_id);
		$criteria->compare('j_id',$this->j_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SlotAlloted the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
