<?php

/**
 * This is the model class for table "comments".
 *
 * The followings are the available columns in table 'comments':
 * @property integer $comment_id
 * @property string $txt
 * @property integer $st_id
 * @property integer $c_id
 * @property integer $j_id
 * @property integer $pr_id
 * @property string $tstamp
 *
 * The followings are the available model relations:
 * @property JobProfile $j
 * @property Company $c
 * @property Student $st
 * @property PlacementRep $pr
 */
class Comments extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'comments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('txt, st_id, j_id, c_id, pr_id', 'required'),
			array('comment_id, st_id, c_id, j_id, pr_id', 'numerical', 'integerOnly'=>true),
			array('txt', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('comment_id, txt, st_id, c_id, j_id, pr_id, tstamp', 'safe', 'on'=>'search'),
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
			'pr' => array(self::BELONGS_TO, 'PlacementRep', 'pr_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'comment_id' => 'Comment',
			'txt' => 'Txt',
			'st_id' => 'St',
			'c_id' => 'C',
			'j_id' => 'J',
			'pr_id' => 'Pr',
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

		$criteria->compare('comment_id',$this->comment_id);
		$criteria->compare('txt',$this->txt,true);
		$criteria->compare('st_id',$this->st_id);
		$criteria->compare('c_id',$this->c_id);
		$criteria->compare('j_id',$this->j_id);
		$criteria->compare('pr_id',$this->pr_id);
		$criteria->compare('tstamp',$this->tstamp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Comments the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
