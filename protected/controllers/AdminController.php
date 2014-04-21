<?php

class AdminController extends Controller
{
    public $layout='//layouts/column2';
	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionViewJobProfiles()
    {
        $sqlcount =  Yii::app()->db->createCommand("select count(*) from job_profile")->queryScalar();
        $sql = "SELECT * FROM job_profile AS j, company AS c WHERE c.c_id = j.c_id ORDER BY  `j`.`approved` DESC ";

        $dataProvider = new CSqlDataProvider($sql, array(
            'db' => Yii::app()->db,
            'keyField' => 'c_id',
            'totalItemCount' => $sqlcount
        ));

        $this->render('viewJobProfiles',array(
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
                'actions'=>array('index','viewJobProfiles'),
                'users'=>array('admin'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }
}