<?php

class OfferController extends Controller
{
	public function actionCreate($j_id,$c_id,$st_id)
	{
        if(Yii::app()->session['role'] == 2)
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
        else
            $this->redirect('index.php?r=site/index');
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

    public function actionViewCompDetails ($c_id)
    {
        $model=Company::model()->findByPk($c_id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        $this->render('viewCompDetails',array('model'=>$model));

    }

    public function actionView()
	{
        if(Yii::app()->session['role'] == 1)
        {
            $sqlcount =  Yii::app()->db->createCommand("select count(*) from student as s, offers as o, job_profile as jp
			where s.st_id=o.st_id and o.j_id = jp.j_id and o.c_id = jp.c_id and s.st_id = ".Yii::App()->user->id)->queryScalar();
            $sql = "select o.joining_date,o.j_id, o.ppo, o.location, o.offer_deadline,o.accepted,c.c_id, c.name as cname, j.description, j.ctc, j.cpi_cutoff, j.approved, j.deadline, s.st_id, s.roll_no, s.name from student as s, offers as o, job_profile as j,company as c
			where s.st_id=o.st_id and o.j_id = j.j_id and o.c_id = j.c_id and j.c_id = c.c_id and s.st_id = ".Yii::App()->user->id;
            $dataProvider = new CSqlDataProvider($sql, array(
                'db' => Yii::app()->db,
                'keyField' => 'j_id',
                'totalItemCount' => $sqlcount
            ));

            $this->render('view',array(
                'dataProvider'=>$dataProvider,
            ));
        }
        else if(Yii::app()->session['role'] == 2)
        {
            $sqlcount =  Yii::app()->db->createCommand("select count(*) from student as s, offers as o, job_profile as jp
			where s.st_id=o.st_id and o.j_id = jp.j_id and o.c_id = jp.c_id and jp.c_id = ".Yii::App()->user->id)->queryScalar();
            $sql = "select o.joining_date,o.j_id, o.ppo, o.location, o.offer_deadline,o.accepted, c.c_id, c.name as cname, j.description, j.ctc, j.cpi_cutoff, j.approved, j.deadline, s.st_id, s.roll_no, s.name from student as s, offers as o, job_profile as j,company as c
			where s.st_id=o.st_id and o.j_id = j.j_id and o.c_id = j.c_id and j.c_id = c.c_id and j.c_id = ".Yii::App()->user->id;
            $dataProvider = new CSqlDataProvider($sql, array(
                'db' => Yii::app()->db,
                'keyField' => 'j_id',
                'totalItemCount' => $sqlcount
            ));

            $this->render('view',array(
                'dataProvider'=>$dataProvider,
            ));
        }
        else
            $this->redirect('index.php?r=site/index');
	}

    public function actionAccept($j_id,$c_id)
    {
        if(Yii::app()->session['role'] == 1)
        {
            $offerAcCount = count(Yii::app()->db->createCommand("select c_id from offers where st_id = ".Yii::app()->user->id." and ppo <> 'Y' and accepted = 'Y'")->queryAll());
            
            if($offerAcCount==0)
            {
                $connection = Yii::App()->db;
                $sql = "UPDATE offers set accepted = 'Y' where j_id = :j_id and c_id = :c_id and st_id = ".Yii::app()->user->id;
                $command = $connection->createCommand($sql);
                $command->bindParam(":j_id",$j_id,PDO::PARAM_STR);
                $command->bindParam(":c_id",$c_id,PDO::PARAM_STR);
                $command->execute();
                Yii::app()->user->setFlash('success','Accepted');
                $this->redirect(array('student/viewOffers'));
            }
            else
            {
                Yii::app()->user->setFlash('error','Slow down! You are already placed. Let others have a chance my friend');
                $this->redirect(array('student/viewOffers'));
            }
        }
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