<?php

class StudentController extends Controller
{
	public $output;
	public function actionIndex()
	{
		$list= Yii::app()->db->createCommand('select * from student')->queryAll();
		$rs=array();
		foreach($list as $item){
		    //process each item here
		    $rs[]=$item['name'];
		}
		
		$this->output = $rs;
		$this->render('index',array('content'=> $this->output));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}