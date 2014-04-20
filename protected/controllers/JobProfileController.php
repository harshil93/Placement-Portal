<?php

class JobProfileController extends Controller
{
	public function actionIndex()
	{
        $this->redirect(array('site/index'));

	}

    public function actionApprove($j_id,$c_id){
        $model=$this->loadModel($j_id, $c_id);
        $model->setAttribute('approved','Y');
        $model->save();
        Yii::app()->user->setFlash('success','Job Profile Approved');
        $this->redirect(array('admin/viewJobProfiles'));
    }

    public function actionReject($j_id,$c_id){
        $model=$this->loadModel($j_id, $c_id);
        $model->setAttribute('approved','N');
        $model->save();
        Yii::app()->user->setFlash('success','Job Profile Rejected');
        $this->redirect(array('admin/viewJobProfiles'));
    }

    public function actionUpdate($j_id, $c_id)
    {
        exit("LOLWA");
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
        if(Yii::app()->session['role'] == 2){

            $sqlcount =  Yii::app()->db->createCommand("select count(*) from apply a,job_profile j where a.c_id=".Yii::app()->user->id." and j.deadline<CURRENT_TIMESTAMP")->queryScalar();
            $sql =  "select a.cv_id, a.j_id, a.c_id, a.tstamp, c.name as cname, j.description, j.ctc, j.cpi_cutoff, j.approved, j.deadline, s.st_id, s.roll_no, s.name from apply as a, job_profile as j, company as c, student as s where s.st_id = a.st_id and a.j_id = j.j_id and a.c_id = c.c_id and c.c_id=".Yii::app()->user->id." and j.j_id = ". $j_id." and j.deadline<CURRENT_TIMESTAMP";



            $dataProvider = new CSqlDataProvider($sql, array(
                'db' => Yii::app()->db,
                'keyField' => 'st_id',
                'totalItemCount' => $sqlcount
            ));
        }
        $this->render('view',array('model'=>$model,'dataProvider'=>$dataProvider,));
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

            echo strtotime($model->deadline);
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
                $this->redirect(array('company/viewjobprofiles'));
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
                'actions'=>array('create','index','view'),
                'users'=>array('@'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create','index','update','delete','admin','view','approve','reject'),
                'users'=>array('admin'),
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