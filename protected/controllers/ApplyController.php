<?php

class ApplyController extends Controller
{
	public function actionCreate()
	{

		$this->render('create');
	}

	public function actionDelete()
	{
		$this->render('delete');
	}

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionUpdate()
	{
		$this->render('update');
	}

	public function actionView()
	{
		$sqlcount =  Yii::app()->db->createCommand("select count(*) from student as s, apply as a, job_profile as jp
			where s.st_id=a.st_id and a.j_id = jp.j_id and a.c_id = jp.c_id and s.st_id = ".Yii::App()->user->id)->queryScalar();
		$sql = "select * from student as s, apply as a, job_profile as jp
			where s.st_id=a.st_id and a.j_id = jp.j_id and a.c_id = jp.c_id and s.st_id = ".Yii::App()->user->id;
		
		$dataProvider = new CSqlDataProvider($sql, array(
			'db' => Yii::app()->db,
			'keyField' => 'j_id',
			'totalItemCount' => $sqlcount
		));
	 
		$this->render('view',array(
			'dataProvider'=>$dataProvider,
		));

	}

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            //'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create','index','update','delete','admin','view'),
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
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