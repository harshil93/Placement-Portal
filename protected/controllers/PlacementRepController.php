<?php

class PlacementRepController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('viewAll','index','update','admin','view','viewCompanies','viewJobProfiles'),
                'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $pr_id the ID of the model to be displayed
	 */
	public function actionView($pr_id)
	{
		$model=$this->loadModel($pr_id);
		$this->render('view',array(
			'model'=>$this->loadModel($pr_id),
		));
	}

	public function actionViewCompanies()
	{
		$dept = PlacementRep::model()->findByPk(Yii::app()->user->id)->getAttribute("dept");

		$sqlcount =  Yii::app()->db->createCommand("select count(*) from (select distinct(c_id) from 
			job_profile_branches where dept = \"".$dept."\") as temp")->queryScalar();
		$sql = "select * from company as c where c.c_id in (select distinct(c_id) from 
			job_profile_branches where dept = \"".$dept."\")";
		
		$dataProvider = new CSqlDataProvider($sql, array(
			'db' => Yii::app()->db,
			'keyField' => 'c_id',
			'totalItemCount' => $sqlcount
		));
		
		$this->render('viewCompanies',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionViewJobProfiles()
	{
		$dept = PlacementRep::model()->findByPk(Yii::app()->user->id)->getAttribute("dept");

		$sqlcount =  Yii::app()->db->createCommand("select count(*) from job_profile_branches where dept = \"".$dept."\"")->queryScalar();
		$sql = "select * from job_profile as j, company as c where (c.c_id,j.j_id) in (select c_id, j_id from job_profile_branches where dept = \"".$dept."\")";
		
		$dataProvider = new CSqlDataProvider($sql, array(
			'db' => Yii::app()->db,
			'keyField' => 'c_id',
			'totalItemCount' => $sqlcount
		));
		
		$this->render('viewJobProfiles',array(
			'dataProvider'=>$dataProvider,
		));
	}
	public function actionViewAll()
	{
		$dataProvider=new CActiveDataProvider('PlacementRep');
		$this->render('viewAll',array(
			'dataProvider'=>$dataProvider,
		));
	}

	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new PlacementRep;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PlacementRep']))
		{
			$model->attributes=$_POST['PlacementRep'];
			if($model->save())
				$this->redirect(array('view','pr_id'=>$model->pr_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $pr_id the ID of the model to be updated
	 */
	public function actionUpdate($pr_id)
	{
		$model=$this->loadModel($pr_id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PlacementRep']))
		{
			$model->attributes=$_POST['PlacementRep'];
			if($model->save())
				$this->redirect(array('view','pr_id'=>$model->pr_id));
		}

		$this->render('_updatePhone',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $pr_id the ID of the model to be deleted
	 */
	public function actionDelete($pr_id)
	{
		$this->loadModel($pr_id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('PlacementRep', array(
			'criteria'=> array(
				'condition'=>'pr_id='.Yii::app()->user->id
			)));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PlacementRep('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PlacementRep']))
			$model->attributes=$_GET['PlacementRep'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $pr_id the ID of the model to be loaded
	 * @return PlacementRep the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($pr_id)
	{
		$model=PlacementRep::model()->findByPk($pr_id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PlacementRep $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='placement-rep-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
