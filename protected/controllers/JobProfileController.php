<?php

class JobProfileController extends Controller
{
	public function actionIndex()
	{
    exit("bablu bond");
        $sql = "SELECT * FROM job_profile_branches t1,job_profile t2 WHERE t1.j_id=t2.j_id AND t1.c_id =  c_id = :c_id ";
        $data = Yii::app()->db->createCommand($sql)->bindValue('c_id',Yii::App()->user->id)->queryAll();

        $this->render('index',array(
            'data'=>$data,
        ));

	}

    public function actionUpdate($j_id, $c_id)
    {
        $model=$this->loadModel($j_id, $c_id);

        if(isset($_POST['Result']))
        {
            $model->attributes=$_POST['Result'];
            $this->saveModel($model);
            $this->redirect(array('view',
                'j_id'=>$model->j_id, 'c_id'=>$model->c_id));
        }
        $this->render('_form',array('model'=>$model,));
    }

    public function  actionView($j_id, $c_id)
    {
        $model = $this->loadModel($j_id, $c_id);
        var_dump($model);
        $this->render('view',array('model'=>$model));
    }


    public function actionDelete($j_id, $c_id)
    {
        if(Yii::app()->request->isPostRequest)
        {
            try
            {
                // we only allow deletion via POST request
                $this->loadModel($j_id, $c_id)->delete();
            }
            catch(Exception $e)
            {
                $this->showError($e);
            }
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if(!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
        else
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }

    public function  loadModel($j_id, $c_id)
    {
        $model = JobProfile::model()->findByPk(array('j_id'=>$j_id,'c_id'=>$c_id));
        if($model==null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    public function actionCreate()
    {
        $model=new JobProfile;


        // uncomment the following code to enable ajax-based validation
        /*
        if(isset($_POST['ajax']) && $_POST['ajax']==='job-profile-_form-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        */

        if(isset($_POST['JobProfile']))
        {
            $model->attributes=$_POST['JobProfile'];
            /*echo "<pre>";
            print_r($_POST['checkbox_list_name']);
            echo "</pre>";*/
            $model->c_id = Yii::App()->user->id;

            if($model->validate())
            {
                // form inputs are valid, do something here
                $model->save();
                $lastTemp= Yii::app()->db->getLastInsertID();
                echo $lastTemp;

                foreach ($_POST['checkbox_list_name'] as $dept) {
                    $model1 = new JobProfileBranches;

                    $model1->j_id = $lastTemp;
                    $model1->c_id = $model->c_id;
                    $model1->dept = $dept;

                    $model1->save();

                }
                Yii::app()->user->setFlash('success','Job Profile Successfully Created. Pending Approval From ADMIN');
                $this->redirect(array('index'));
                return;
            }
        }
        $this->render('_form',array('model'=>$model));
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