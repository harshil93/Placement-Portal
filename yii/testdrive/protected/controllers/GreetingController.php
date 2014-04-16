<?php

class GreetingController extends Controller
{
	public $message;
	public function actionIndex()
	{
		$list= Yii::app()->db->createCommand('select * from login')->queryAll();
		$rs=array();
		foreach($list as $item){
		    //process each item here
		    $rs[]=$item['password'];
		}
		
		$this->message = $rs;
		$this->render('index',array('content'=> $this->message));
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