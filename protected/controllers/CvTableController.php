<?php

class CvTableController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionCreate()
    {
        $model=new CvTable;
        if(isset($_POST['CvTable']))
        {

            $model->attributes=$_POST['CvTable'];
            $model->st_id = Yii::app()->user->id;
            $model->cv_name=CUploadedFile::getInstance($model,'cv_name');
            $model->cv = 'uploads/'.Yii::app()->user->id.time().".".$model->cv_name->extensionName;
            if($model->save())
            {
                $model->cv_name->saveAs('uploads/'.Yii::app()->user->id.time().".".$model->cv_name->extensionName);
                Yii::app()->user->setFlash('success','Uploaded Successfully');

            }
        }

        $this->render('create', array('model'=>$model));
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