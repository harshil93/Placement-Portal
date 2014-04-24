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
        $sql = "SELECT j.*, st.start_time,st.end_time,st.room_no,st.slot_id,c.* FROM job_profile j left join slot_time st on j.j_id =st.j_id, company as c WHERE c.c_id = j.c_id  ORDER BY  `j`.`approved` DESC";

        $dataProvider = new CSqlDataProvider($sql, array(
            'db' => Yii::app()->db,
            'keyField' => 'j_id',
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