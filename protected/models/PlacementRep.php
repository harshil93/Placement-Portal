<?php

/**
 * This is the model class for table "placement_rep".
 *
 * The followings are the available columns in table 'placement_rep':
 * @property string $name
 * @property string $phone_no
 * @property integer $pr_id
 * @property string $dept
 * @property string $programme
 *
 * The followings are the available model relations:
 * @property Comments[] $comments
 * @property Login $pr
 */
class PlacementRep extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'placement_rep';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, phone_no, pr_id, dept, programme', 'required'),
			array('pr_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('phone_no', 'length', 'max'=>10),
			array('dept', 'length', 'max'=>3),
			array('programme', 'length', 'max'=>5),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('name, phone_no, pr_id, dept, programme', 'safe', 'on'=>'search'),
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
			'comments' => array(self::HAS_MANY, 'Comments', 'pr_id'),
			'pr' => array(self::BELONGS_TO, 'Login', 'pr_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'name' => 'Name',
			'phone_no' => 'Phone No',
			'pr_id' => 'Pr',
			'dept' => 'Dept',
			'programme' => 'Programme',
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

		$criteria->compare('name',$this->name,true);
		$criteria->compare('phone_no',$this->phone_no,true);
		$criteria->compare('pr_id',$this->pr_id);
		$criteria->compare('dept',$this->dept,true);
		$criteria->compare('programme',$this->programme,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PlacementRep the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
