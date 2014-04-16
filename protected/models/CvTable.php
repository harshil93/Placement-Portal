<?php

/**
 * This is the model class for table "cv_table".
 *
 * The followings are the available columns in table 'cv_table':
 * @property integer $st_id
 * @property integer $cv_id
 * @property string $cv
 * @property string $cv_name
 *
 * The followings are the available model relations:
 * @property Apply[] $applies
 * @property Student $st
 */
class CvTable extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cv_table';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('st_id, cv_name', 'required'),
			array('st_id', 'numerical', 'integerOnly'=>true),
			array('cv_name', 'length', 'max'=>50),
			array('cv', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('st_id, cv_id, cv, cv_name', 'safe', 'on'=>'search'),
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
			'applies' => array(self::HAS_MANY, 'Apply', 'cv_id'),
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
			'cv_id' => 'Cv',
			'cv' => 'Cv',
			'cv_name' => 'Cv Name',
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
		$criteria->compare('cv_id',$this->cv_id);
		$criteria->compare('cv',$this->cv,true);
		$criteria->compare('cv_name',$this->cv_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CvTable the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
