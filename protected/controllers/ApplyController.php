<?php

class ApplyController extends Controller
{
	public function actionCreate($j_id, $c_id)
	{


        $sqlcount =  Yii::app()->db->createCommand("select count(*) from job_profile where j_id = ".$j_id." and c_id = ".$c_id)->queryScalar();
        $sql = "select * from job_profile where j_id = ".$j_id." and c_id = ".$c_id;

        $dataProvider = new CSqlDataProvider($sql, array(
        'db' => Yii::app()->db,
        'keyField' => 'j_id',
        'totalItemCount' => $sqlcount
        ));

        $sqlcount =  Yii::app()->db->createCommand("select count(*) from cv_table where st_id = ".Yii::App()->user->id)->queryScalar();
        $sql = "select * from cv_table where st_id = ".Yii::App()->user->id;
        $res =  Yii::app()->db->createCommand("select * from cv_table where st_id = ".Yii::App()->user->id)->queryAll();



        $cv_list = array();

        foreach($res as $item){
            $cv_list[$item["cv_id"]] = $item["cv_name"];
        }

        $this->render('create',array(
        'dataProvider'=>$dataProvider,
        'cv_list'=>$cv_list,
         'j_id'=>$j_id,
         'c_id'=>$c_id,
        ));
	}

    public function actionSave($j_id,$c_id)
    {

        if(!(isset($_POST['cv_id']) && isset($j_id) && isset ($c_id))){
            Yii::app()->user->setFlash('error','Error');
            $this->redirect(array('index'));
        }
        $studinfo = Student::model()->findByPk(Yii::App()->user->id);

        $dept = $studinfo->getAttribute("dept");
        $cpi = $studinfo->getAttribute("cpi");

        $sqlcount =  Yii::app()->db->createCommand("select count(*) from job_profile_branches as jpb where j_id =
         ".$j_id." and c_id = ".$c_id." and dept = '".$dept."'" )->queryScalar();

        $jobinfo = JobProfile::model()->find('j_id = ? and c_id = ?',array($j_id,$c_id));

        if(count($jobinfo))
        {
            $cutoff = $jobinfo->getAttribute("cpi_cutoff");

            if($sqlcount && $cpi>=$cutoff)
            {
               try{
                   $st_id = Yii::App()->user->id;
                   $connection = Yii::App()->db;
                   $sql = "INSERT INTO apply (j_id,c_id,cv_id,st_id) values(:j_id,:c_id,:cv_id,:st_id)";
                   $command = $connection->createCommand($sql);
                   $command->bindParam(":j_id",$j_id,PDO::PARAM_STR);
                   $command->bindParam(":c_id",$c_id,PDO::PARAM_STR);
                   $command->bindParam(":cv_id",$_POST['cv_id'],PDO::PARAM_STR);
                   $command->bindParam(":st_id",$st_id,PDO::PARAM_STR);
                   $command->execute();
                   
               }catch(Exception $e){
                   Yii::app()->user->setFlash('error','Either you are trying to reapply or you are doing something bad ');
            }
            }else{
                Yii::app()->user->setFlash('error','sql count cpi cutoff');
            }

        }else{
            Yii::app()->user->setFlash('error','count 0');

        }

        $this->redirect('index.php?r=student/index');
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
            $sqlcount =  Yii::app()->db->createCommand("select count(*) from student as s, apply as a, job_profile as jp
			where s.st_id=a.st_id and a.j_id = jp.j_id and a.c_id = jp.c_id and s.st_id = ".Yii::App()->user->id)->queryScalar();
            $sql = "select * from student as s, apply as a, job_profile as jp
			where s.st_id=a.st_id and a.j_id = jp.j_id and a.c_id = jp.c_id and s.st_id = ".Yii::App()->user->id;

        }
        else if(Yii::app()->session['role'] == 2)
        {
            $sqlcount =  Yii::app()->db->createCommand("select count(*) from student as s, apply as a, job_profile as jp
			where s.st_id=a.st_id and a.j_id = jp.j_id and a.c_id = jp.c_id and jp.c_id = ".Yii::App()->user->id)->queryScalar();
            $sql = "select * from student as s, apply as a, job_profile as jp
			where s.st_id=a.st_id and a.j_id = jp.j_id and a.c_id = jp.c_id and jp.c_id = ".Yii::App()->user->id;


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
                'actions'=>array('create','index','update','delete','admin','view','save'),
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