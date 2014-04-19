<?php

class OfferController extends Controller
{
	public function actionCreate($j_id,$c_id,$st_id)
	{
        if(!(isset($st_id) && isset($j_id) && isset ($c_id))){
            Yii::app()->user->setFlash('error','Error');
            $this->redirect(array('index'));
        }

        $sqlcount =  Yii::app()->db->createCommand("select count(*) from apply where j_id =
         ".$j_id." and c_id = ".$c_id." and st_id = '".$st_id."'" )->queryScalar();

        if($sqlcount)
        {
            try{
                $connection = Yii::App()->db;
                $sql = "INSERT INTO offers (j_id,c_id,st_id) values(:j_id,:c_id,:st_id)";
                $command = $connection->createCommand($sql);
                $command->bindParam(":j_id",$j_id,PDO::PARAM_STR);
                $command->bindParam(":c_id",$c_id,PDO::PARAM_STR);
                $command->bindParam(":st_id",$st_id,PDO::PARAM_STR);
                $command->execute();

            }catch(Exception $e){
                echo "Exception";
                exit(1);
            }

        }else{
            Yii::app()->user->setFlash('error','count 0');

        }

        $this->redirect('index.php?r=company/index');

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
        if(Yii::app()->session['role'] == 1)
        {
            $sqlcount =  Yii::app()->db->createCommand("select count(*) from student as s, offers as o, job_profile as jp
			where s.st_id=o.st_id and o.j_id = jp.j_id and o.c_id = jp.c_id and s.st_id = ".Yii::App()->user->id)->queryScalar();
            $sql = "select * from student as s, offers as o, job_profile as jp
			where s.st_id=o.st_id and o.j_id = jp.j_id and o.c_id = jp.c_id and s.st_id = ".Yii::App()->user->id;

        }
        else if(Yii::app()->session['role'] == 2)
        {
            $sqlcount =  Yii::app()->db->createCommand("select count(*) from student as s, offers as o, job_profile as jp
			where s.st_id=o.st_id and o.j_id = jp.j_id and o.c_id = jp.c_id and jp.c_id = ".Yii::App()->user->id)->queryScalar();
            $sql = "select * from student as s, offers as o, job_profile as jp
			where s.st_id=o.st_id and o.j_id = jp.j_id and o.c_id = jp.c_id and jp.c_id = ".Yii::App()->user->id;
        }

        $dataProvider = new CSqlDataProvider($sql, array(
            'db' => Yii::app()->db,
            'keyField' => 'j_id',
            'totalItemCount' => $sqlcount
        ));

        $this->render('view',array(
            'dataProvider'=>$dataProvider,
        ));

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