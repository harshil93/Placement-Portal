<?php
class FileController extends CController
{
    public function actionCreate()
    {
        $model=new File;
        if(isset($_POST['Item']))
        {
            $model->attributes=$_POST['Item'];
            $model->resume=CUploadedFile::getInstance($model,'resume');
            if($model->save())
            {
                $model->resume->saveAs('uploads/'.Yii::app()->user->id.".pdf");
                Yii::app()->user->setFlash('success','Uploaded');

                $this->redirect(array('site/index'));
                // redirect to success page
            }
        }
        $this->render('create', array('model'=>$model));
    }
}
?>