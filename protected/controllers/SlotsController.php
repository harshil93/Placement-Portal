<?php

class SlotsController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','viewJobSlots','viewPptSlots','allotPptSlots','allotJobSlots'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin','viewJobSlots','viewPptSlots','allotPptSlots','allotJobSlots'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

    public function actionViewJobSlots()
    {
        if(Yii::app()->session['role'] == 2)
        {
            $sqlcount = Yii::app()->db->createCommand("Select count(*) from slot_alloted as sa, company as c, slots as s,job_profile as j
             where sa.slot_id=s.slot_id and sa.c_id=c.c_id and sa.c_id=j.c_id and sa.j_id=j.j_id and  c.c_id = ".Yii::App()->user->id)->queryScalar();

            $sql = "Select * from slot_alloted as sa, company as c, slots as s,job_profile as j
             where sa.slot_id=s.slot_id and sa.c_id=c.c_id and sa.c_id=j.c_id and sa.j_id=j.j_id and  c.c_id = ".Yii::App()->user->id;

            $dataProvider = new CSqlDataProvider($sql, array(
                'db' => Yii::app()->db,
                'keyField' => 'c_id',
                'totalItemCount' => $sqlcount
            ));

            $this->render('viewJobSlots',array(
                'dataProvider'=>$dataProvider,
            ));
        }
        else
        {
            $sqlcount = Yii::app()->db->createCommand("Select count(*) from slot_alloted as sa, company as c, slots as s,job_profile as j
             where sa.slot_id=s.slot_id and sa.c_id=c.c_id and sa.c_id=j.c_id and sa.j_id=j.j_id")->queryScalar();

            $sql = "Select * from slot_alloted as sa, company as c, slots as s,job_profile as j
             where sa.slot_id=s.slot_id and sa.c_id=c.c_id and sa.c_id=j.c_id and sa.j_id=j.j_id";

            $dataProvider = new CSqlDataProvider($sql, array(
                'db' => Yii::app()->db,
                'keyField' => 'c_id',
                'totalItemCount' => $sqlcount
            ));

            $this->render('viewJobSlots',array(
                'dataProvider'=>$dataProvider,
            ));
        }
    }

    public function actionViewPptSlots()
    {
        if(Yii::app()->session['role'] == 2)
        {
            $sqlcount = Yii::app()->db->createCommand("Select count(*) from ppt_slots as sa, company as c, slots as s
             where sa.slot_id=s.slot_id and sa.c_id=c.c_id and  c.c_id = ".Yii::App()->user->id)->queryScalar();

            $sql = "Select * from ppt_slots as sa, company as c, slots as s
             where sa.slot_id=s.slot_id and sa.c_id=c.c_id and  c.c_id = ".Yii::App()->user->id;

            $dataProvider = new CSqlDataProvider($sql, array(
                'db' => Yii::app()->db,
                'keyField' => 'c_id',
                'totalItemCount' => $sqlcount
            ));

            $this->render('viewPptSlots',array(
                'dataProvider'=>$dataProvider,
            ));
        }
        else
        {
            $sqlcount = Yii::app()->db->createCommand("Select count(*) from ppt_slots as sa, company as c, slots as s
             where sa.slot_id=s.slot_id and sa.c_id=c.c_id")->queryScalar();

            $sql = "Select * from ppt_slots as sa, company as c, slots as s
             where sa.slot_id=s.slot_id and sa.c_id=c.c_id";

            $dataProvider = new CSqlDataProvider($sql, array(
                'db' => Yii::app()->db,
                'keyField' => 'c_id',
                'totalItemCount' => $sqlcount
            ));

            $this->render('viewPptSlots',array(
                'dataProvider'=>$dataProvider,
            ));
        }
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Slots;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Slots']))
		{
			$model->attributes=$_POST['Slots'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->slot_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Slots']))
		{
			$model->attributes=$_POST['Slots'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->slot_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Slots');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Slots('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Slots']))
			$model->attributes=$_GET['Slots'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

    public function actionAllotJobSlots($slot_id, $c_id,$j_id)
    {
       if(Yii::app()->session['role'] == 0)
       {
           try{
               $connection = Yii::App()->db;
               $sql = "INSERT INTO slot_alloted (j_id,c_id,slot_id) values(:j_id,:c_id,:slot_id)";
               $command = $connection->createCommand($sql);
               $command->bindParam(":j_id",$j_id,PDO::PARAM_STR);
               $command->bindParam(":c_id",$c_id,PDO::PARAM_STR);
               $command->bindParam(":slot_id",$slot_id,PDO::PARAM_STR);
               $command->execute();

           }catch(Exception $e){
               Yii::app()->user->setFlash('error','Unable to insert slot');
           }
       }
        else
        {
            Yii::app()->user->setFlash('error','You are not authorized to perform such actions');
        }
        $this->redirect(array('viewJobSlots'));
    }

    public function actionAllotPptSlots($slot_id, $c_id)
    {
        if(Yii::app()->session['role'] == 0)
        {
            try{
                $connection = Yii::App()->db;
                $sql = "INSERT INTO ppt_slots (c_id,slot_id) values (:c_id,:slot_id)";
                $command = $connection->createCommand($sql);
                $command->bindParam(":c_id",$c_id,PDO::PARAM_STR);
                $command->bindParam(":slot_id",$slot_id,PDO::PARAM_STR);
                $command->execute();

            }catch(Exception $e){
                Yii::app()->user->setFlash('error','Unable to insert slot');
            }

        }
        else
        {
            Yii::app()->user->setFlash('error','You are not authorized to perform such actions');
        }
        $this->redirect(array('viewPptSlots'));

    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Slots the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Slots::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Slots $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='slots-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
