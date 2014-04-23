<?php

class StatsController extends Controller
{
	public $layout='//layouts/column2';

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
				'actions'=>array('index','companyWise','cse','mnc','eee','ece','cl','ce','ep','bt','dod','me','cst','hss'),
                'users'=>array('@'),

			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from student")->queryRow();
		$totalReg = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from offers as o")->queryRow();
		$totalOffers = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from (select distinct(o.st_id) from offers as o) as temp")->queryRow();
		$actualStudPlaced = $sql['cnt'];

		if($totalReg==0) $percent=0;
		else $percent = ($actualStudPlaced*100)/$totalReg;

		$sql =  Yii::app()->db->createCommand("select avg(j.ctc) as av from offers as o, student as s, job_profile as j where j.j_id = o.j_id and j.c_id = o.c_id and o.st_id = s.st_id and s.programme=\"BTECH\"")->queryRow();
		$btechAvg = $sql['av'];

		$sql =  Yii::app()->db->createCommand("select avg(j.ctc) as av from offers as o, student as s, job_profile as j where j.j_id = o.j_id and j.c_id = o.c_id and o.st_id = s.st_id and s.programme=\"MTECH\"")->queryRow();
		$mtechAvg = $sql['av'];

		$sql =  Yii::app()->db->createCommand("select avg(j.ctc) as av from offers as o, student as s, job_profile as j where j.j_id = o.j_id and j.c_id = o.c_id and o.st_id = s.st_id")->queryRow();
		$overallAvg = $sql['av'];

		$this->render('index',array(
			'totalReg'=>$totalReg,
			'totalOffers'=>$totalOffers,
			'actualStudPlaced'=>$actualStudPlaced,
			'percent'=>$percent,
			'btechAvg'=>$btechAvg,
			'mtechAvg'=>$mtechAvg,
			'overallAvg'=>$overallAvg,
		));
	}

	public function actionCompanyWise()
	{
		$sqlcount =  Yii::app()->db->createCommand("select count(*) from (select temp.cnt as cnt, c.name as name from (select count(*) as cnt, o.c_id from offers as o group by o.c_id) as temp, company as c where c.c_id = temp.c_id) as x")->queryScalar();
		$sql = "select temp.cnt as cnt, c.name as name from (select count(*) as cnt, o.c_id from offers as o group by o.c_id) as temp, company as c where c.c_id = temp.c_id";
		
		$dataProvider = new CSqlDataProvider($sql, array(
			'db' => Yii::app()->db,
			'keyField' => 'name',
			'totalItemCount' => $sqlcount
		));
		
		$this->render('companyWise',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actioncse()
	{
		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from student where dept=\"CSE\" and programme = \"BTECH\"")->queryRow();
		$totalRegB = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from offers as o, student as s where o.st_id = s.st_id and s.dept=\"CSE\" and s.programme = \"BTECH\"")->queryRow();
		$totalOffersB = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from (select distinct(oTemp.st_id) from offers as oTemp) as o, student as s where o.st_id = s.st_id and s.dept=\"CSE\" and s.programme = \"BTECH\"")->queryRow();
		$actualStudPlacedB = $sql['cnt'];

		if($totalRegB==0) $percentB=0;
		else $percentB = ($actualStudPlacedB*100)/$totalRegB;

		$sql =  Yii::app()->db->createCommand("select avg(j.ctc) as av from offers as o, student as s, job_profile as j where j.j_id = o.j_id and j.c_id = o.c_id and o.st_id = s.st_id and s.dept=\"CSE\" and s.programme = \"BTECH\"")->queryRow();
		$avgB = $sql['av'];



		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from student where dept=\"CSE\" and programme = \"MTECH\"")->queryRow();
		$totalRegM = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from offers as o, student as s where o.st_id = s.st_id and s.dept=\"CSE\" and s.programme = \"MTECH\"")->queryRow();
		$totalOffersM = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from (select distinct(oTemp.st_id) from offers as oTemp) as o, student as s where o.st_id = s.st_id and s.dept=\"CSE\" and s.programme = \"MTECH\"")->queryRow();
		$actualStudPlacedM = $sql['cnt'];

		if($totalRegM==0) $percentM=0;
		else $percentM = ($actualStudPlacedM*100)/$totalRegM;

		$sql =  Yii::app()->db->createCommand("select avg(j.ctc) as av from offers as o, student as s, job_profile as j where j.j_id = o.j_id and j.c_id = o.c_id and o.st_id = s.st_id and s.dept=\"CSE\" and s.programme = \"MTECH\"")->queryRow();
		$avgM = $sql['av'];

		$this->render('cse',array(
			'totalRegB'=>$totalRegB,
			'totalOffersB'=>$totalOffersB,
			'actualStudPlacedB'=>$actualStudPlacedB,
			'percentB'=>$percentB,
			'avgB'=>$avgB,
			'totalRegM'=>$totalRegM,
			'totalOffersM'=>$totalOffersM,
			'actualStudPlacedM'=>$actualStudPlacedM,
			'percentM'=>$percentM,
			'avgM'=>$avgM,
			
		));
	}

	public function actionmnc()
	{
		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from student where dept=\"MNC\" and programme = \"BTECH\"")->queryRow();
		$totalRegB = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from offers as o, student as s where o.st_id = s.st_id and s.dept=\"MNC\" and s.programme = \"BTECH\"")->queryRow();
		$totalOffersB = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from (select distinct(oTemp.st_id) from offers as oTemp) as o, student as s where o.st_id = s.st_id and s.dept=\"MNC\" and s.programme = \"BTECH\"")->queryRow();
		$actualStudPlacedB = $sql['cnt'];

		if($totalRegB==0) $percentB=0;
		else $percentB = ($actualStudPlacedB*100)/$totalRegB;

		$sql =  Yii::app()->db->createCommand("select avg(j.ctc) as av from offers as o, student as s, job_profile as j where j.j_id = o.j_id and j.c_id = o.c_id and o.st_id = s.st_id and s.dept=\"MNC\" and s.programme = \"BTECH\"")->queryRow();
		$avgB = $sql['av'];



		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from student where dept=\"MNC\" and programme = \"MTECH\"")->queryRow();
		$totalRegM = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from offers as o, student as s where o.st_id = s.st_id and s.dept=\"MNC\" and s.programme = \"MTECH\"")->queryRow();
		$totalOffersM = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from (select distinct(oTemp.st_id) from offers as oTemp) as o, student as s where o.st_id = s.st_id and s.dept=\"MNC\" and s.programme = \"MTECH\"")->queryRow();
		$actualStudPlacedM = $sql['cnt'];

		if($totalRegM==0) $percentM=0;
		else $percentM = ($actualStudPlacedM*100)/$totalRegM;

		$sql =  Yii::app()->db->createCommand("select avg(j.ctc) as av from offers as o, student as s, job_profile as j where j.j_id = o.j_id and j.c_id = o.c_id and o.st_id = s.st_id and s.dept=\"MNC\" and s.programme = \"MTECH\"")->queryRow();
		$avgM = $sql['av'];

		$this->render('mnc',array(
			'totalRegB'=>$totalRegB,
			'totalOffersB'=>$totalOffersB,
			'actualStudPlacedB'=>$actualStudPlacedB,
			'percentB'=>$percentB,
			'avgB'=>$avgB,
			'totalRegM'=>$totalRegM,
			'totalOffersM'=>$totalOffersM,
			'actualStudPlacedM'=>$actualStudPlacedM,
			'percentM'=>$percentM,
			'avgM'=>$avgM,
			
		));
	}

	public function actionece()
	{
		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from student where dept=\"ECE\" and programme = \"BTECH\"")->queryRow();
		$totalRegB = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from offers as o, student as s where o.st_id = s.st_id and s.dept=\"ECE\" and s.programme = \"BTECH\"")->queryRow();
		$totalOffersB = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from (select distinct(oTemp.st_id) from offers as oTemp) as o, student as s where o.st_id = s.st_id and s.dept=\"ECE\" and s.programme = \"BTECH\"")->queryRow();
		$actualStudPlacedB = $sql['cnt'];

		if($totalRegB==0) $percentB=0;
		else $percentB = ($actualStudPlacedB*100)/$totalRegB;

		$sql =  Yii::app()->db->createCommand("select avg(j.ctc) as av from offers as o, student as s, job_profile as j where j.j_id = o.j_id and j.c_id = o.c_id and o.st_id = s.st_id and s.dept=\"ECE\" and s.programme = \"BTECH\"")->queryRow();
		$avgB = $sql['av'];



		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from student where dept=\"ECE\" and programme = \"MTECH\"")->queryRow();
		$totalRegM = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from offers as o, student as s where o.st_id = s.st_id and s.dept=\"ECE\" and s.programme = \"MTECH\"")->queryRow();
		$totalOffersM = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from (select distinct(oTemp.st_id) from offers as oTemp) as o, student as s where o.st_id = s.st_id and s.dept=\"ECE\" and s.programme = \"MTECH\"")->queryRow();
		$actualStudPlacedM = $sql['cnt'];

		if($totalRegM==0) $percentM=0;
		else $percentM = ($actualStudPlacedM*100)/$totalRegM;

		$sql =  Yii::app()->db->createCommand("select avg(j.ctc) as av from offers as o, student as s, job_profile as j where j.j_id = o.j_id and j.c_id = o.c_id and o.st_id = s.st_id and s.dept=\"ECE\" and s.programme = \"MTECH\"")->queryRow();
		$avgM = $sql['av'];

		$this->render('ece',array(
			'totalRegB'=>$totalRegB,
			'totalOffersB'=>$totalOffersB,
			'actualStudPlacedB'=>$actualStudPlacedB,
			'percentB'=>$percentB,
			'avgB'=>$avgB,
			'totalRegM'=>$totalRegM,
			'totalOffersM'=>$totalOffersM,
			'actualStudPlacedM'=>$actualStudPlacedM,
			'percentM'=>$percentM,
			'avgM'=>$avgM,
			
		));
	}

	public function actioneee()
	{
		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from student where dept=\"EEE\" and programme = \"BTECH\"")->queryRow();
		$totalRegB = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from offers as o, student as s where o.st_id = s.st_id and s.dept=\"EEE\" and s.programme = \"BTECH\"")->queryRow();
		$totalOffersB = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from (select distinct(oTemp.st_id) from offers as oTemp) as o, student as s where o.st_id = s.st_id and s.dept=\"EEE\" and s.programme = \"BTECH\"")->queryRow();
		$actualStudPlacedB = $sql['cnt'];

		if($totalRegB==0) $percentB=0;
		else $percentB = ($actualStudPlacedB*100)/$totalRegB;

		$sql =  Yii::app()->db->createCommand("select avg(j.ctc) as av from offers as o, student as s, job_profile as j where j.j_id = o.j_id and j.c_id = o.c_id and o.st_id = s.st_id and s.dept=\"EEE\" and s.programme = \"BTECH\"")->queryRow();
		$avgB = $sql['av'];



		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from student where dept=\"EEE\" and programme = \"MTECH\"")->queryRow();
		$totalRegM = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from offers as o, student as s where o.st_id = s.st_id and s.dept=\"EEE\" and s.programme = \"MTECH\"")->queryRow();
		$totalOffersM = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from (select distinct(oTemp.st_id) from offers as oTemp) as o, student as s where o.st_id = s.st_id and s.dept=\"EEE\" and s.programme = \"MTECH\"")->queryRow();
		$actualStudPlacedM = $sql['cnt'];

		if($totalRegM==0) $percentM=0;
		else $percentM = ($actualStudPlacedM*100)/$totalRegM;

		$sql =  Yii::app()->db->createCommand("select avg(j.ctc) as av from offers as o, student as s, job_profile as j where j.j_id = o.j_id and j.c_id = o.c_id and o.st_id = s.st_id and s.dept=\"EEE\" and s.programme = \"MTECH\"")->queryRow();
		$avgM = $sql['av'];

		$this->render('eee',array(
			'totalRegB'=>$totalRegB,
			'totalOffersB'=>$totalOffersB,
			'actualStudPlacedB'=>$actualStudPlacedB,
			'percentB'=>$percentB,
			'avgB'=>$avgB,
			'totalRegM'=>$totalRegM,
			'totalOffersM'=>$totalOffersM,
			'actualStudPlacedM'=>$actualStudPlacedM,
			'percentM'=>$percentM,
			'avgM'=>$avgM,
			
		));
	}


	public function actioncl()
	{
		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from student where dept=\"cl\" and programme = \"BTECH\"")->queryRow();
		$totalRegB = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from offers as o, student as s where o.st_id = s.st_id and s.dept=\"cl\" and s.programme = \"BTECH\"")->queryRow();
		$totalOffersB = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from (select distinct(oTemp.st_id) from offers as oTemp) as o, student as s where o.st_id = s.st_id and s.dept=\"cl\" and s.programme = \"BTECH\"")->queryRow();
		$actualStudPlacedB = $sql['cnt'];

		if($totalRegB==0) $percentB=0;
		else $percentB = ($actualStudPlacedB*100)/$totalRegB;

		$sql =  Yii::app()->db->createCommand("select avg(j.ctc) as av from offers as o, student as s, job_profile as j where j.j_id = o.j_id and j.c_id = o.c_id and o.st_id = s.st_id and s.dept=\"cl\" and s.programme = \"BTECH\"")->queryRow();
		$avgB = $sql['av'];



		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from student where dept=\"cl\" and programme = \"MTECH\"")->queryRow();
		$totalRegM = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from offers as o, student as s where o.st_id = s.st_id and s.dept=\"cl\" and s.programme = \"MTECH\"")->queryRow();
		$totalOffersM = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from (select distinct(oTemp.st_id) from offers as oTemp) as o, student as s where o.st_id = s.st_id and s.dept=\"cl\" and s.programme = \"MTECH\"")->queryRow();
		$actualStudPlacedM = $sql['cnt'];

		if($totalRegM==0) $percentM=0;
		else $percentM = ($actualStudPlacedM*100)/$totalRegM;

		$sql =  Yii::app()->db->createCommand("select avg(j.ctc) as av from offers as o, student as s, job_profile as j where j.j_id = o.j_id and j.c_id = o.c_id and o.st_id = s.st_id and s.dept=\"cl\" and s.programme = \"MTECH\"")->queryRow();
		$avgM = $sql['av'];

		$this->render('cl',array(
			'totalRegB'=>$totalRegB,
			'totalOffersB'=>$totalOffersB,
			'actualStudPlacedB'=>$actualStudPlacedB,
			'percentB'=>$percentB,
			'avgB'=>$avgB,
			'totalRegM'=>$totalRegM,
			'totalOffersM'=>$totalOffersM,
			'actualStudPlacedM'=>$actualStudPlacedM,
			'percentM'=>$percentM,
			'avgM'=>$avgM,
			
		));
	}


	public function actionce()
	{
		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from student where dept=\"CE\" and programme = \"BTECH\"")->queryRow();
		$totalRegB = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from offers as o, student as s where o.st_id = s.st_id and s.dept=\"CE\" and s.programme = \"BTECH\"")->queryRow();
		$totalOffersB = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from (select distinct(oTemp.st_id) from offers as oTemp) as o, student as s where o.st_id = s.st_id and s.dept=\"CE\" and s.programme = \"BTECH\"")->queryRow();
		$actualStudPlacedB = $sql['cnt'];

		if($totalRegB==0) $percentB=0;
		else $percentB = ($actualStudPlacedB*100)/$totalRegB;

		$sql =  Yii::app()->db->createCommand("select avg(j.ctc) as av from offers as o, student as s, job_profile as j where j.j_id = o.j_id and j.c_id = o.c_id and o.st_id = s.st_id and s.dept=\"CE\" and s.programme = \"BTECH\"")->queryRow();
		$avgB = $sql['av'];



		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from student where dept=\"CE\" and programme = \"MTECH\"")->queryRow();
		$totalRegM = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from offers as o, student as s where o.st_id = s.st_id and s.dept=\"CE\" and s.programme = \"MTECH\"")->queryRow();
		$totalOffersM = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from (select distinct(oTemp.st_id) from offers as oTemp) as o, student as s where o.st_id = s.st_id and s.dept=\"CE\" and s.programme = \"MTECH\"")->queryRow();
		$actualStudPlacedM = $sql['cnt'];

		if($totalRegM==0) $percentM=0;
		else $percentM = ($actualStudPlacedM*100)/$totalRegM;

		$sql =  Yii::app()->db->createCommand("select avg(j.ctc) as av from offers as o, student as s, job_profile as j where j.j_id = o.j_id and j.c_id = o.c_id and o.st_id = s.st_id and s.dept=\"CE\" and s.programme = \"MTECH\"")->queryRow();
		$avgM = $sql['av'];

		$this->render('ce',array(
			'totalRegB'=>$totalRegB,
			'totalOffersB'=>$totalOffersB,
			'actualStudPlacedB'=>$actualStudPlacedB,
			'percentB'=>$percentB,
			'avgB'=>$avgB,
			'totalRegM'=>$totalRegM,
			'totalOffersM'=>$totalOffersM,
			'actualStudPlacedM'=>$actualStudPlacedM,
			'percentM'=>$percentM,
			'avgM'=>$avgM,
			
		));
	}

	public function actionep()
	{
		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from student where dept=\"EP\" and programme = \"BTECH\"")->queryRow();
		$totalRegB = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from offers as o, student as s where o.st_id = s.st_id and s.dept=\"EP\" and s.programme = \"BTECH\"")->queryRow();
		$totalOffersB = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from (select distinct(oTemp.st_id) from offers as oTemp) as o, student as s where o.st_id = s.st_id and s.dept=\"EP\" and s.programme = \"BTECH\"")->queryRow();
		$actualStudPlacedB = $sql['cnt'];

		if($totalRegB==0) $percentB=0;
		else $percentB = ($actualStudPlacedB*100)/$totalRegB;

		$sql =  Yii::app()->db->createCommand("select avg(j.ctc) as av from offers as o, student as s, job_profile as j where j.j_id = o.j_id and j.c_id = o.c_id and o.st_id = s.st_id and s.dept=\"EP\" and s.programme = \"BTECH\"")->queryRow();
		$avgB = $sql['av'];



		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from student where dept=\"EP\" and programme = \"MTECH\"")->queryRow();
		$totalRegM = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from offers as o, student as s where o.st_id = s.st_id and s.dept=\"EP\" and s.programme = \"MTECH\"")->queryRow();
		$totalOffersM = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from (select distinct(oTemp.st_id) from offers as oTemp) as o, student as s where o.st_id = s.st_id and s.dept=\"EP\" and s.programme = \"MTECH\"")->queryRow();
		$actualStudPlacedM = $sql['cnt'];

		if($totalRegM==0) $percentM=0;
		else $percentM = ($actualStudPlacedM*100)/$totalRegM;

		$sql =  Yii::app()->db->createCommand("select avg(j.ctc) as av from offers as o, student as s, job_profile as j where j.j_id = o.j_id and j.c_id = o.c_id and o.st_id = s.st_id and s.dept=\"EP\" and s.programme = \"MTECH\"")->queryRow();
		$avgM = $sql['av'];

		$this->render('ep',array(
			'totalRegB'=>$totalRegB,
			'totalOffersB'=>$totalOffersB,
			'actualStudPlacedB'=>$actualStudPlacedB,
			'percentB'=>$percentB,
			'avgB'=>$avgB,
			'totalRegM'=>$totalRegM,
			'totalOffersM'=>$totalOffersM,
			'actualStudPlacedM'=>$actualStudPlacedM,
			'percentM'=>$percentM,
			'avgM'=>$avgM,
			
		));
	}

	public function actionbt()
	{
		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from student where dept=\"BT\" and programme = \"BTECH\"")->queryRow();
		$totalRegB = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from offers as o, student as s where o.st_id = s.st_id and s.dept=\"BT\" and s.programme = \"BTECH\"")->queryRow();
		$totalOffersB = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from (select distinct(oTemp.st_id) from offers as oTemp) as o, student as s where o.st_id = s.st_id and s.dept=\"BT\" and s.programme = \"BTECH\"")->queryRow();
		$actualStudPlacedB = $sql['cnt'];

		if($totalRegB==0) $percentB=0;
		else $percentB = ($actualStudPlacedB*100)/$totalRegB;

		$sql =  Yii::app()->db->createCommand("select avg(j.ctc) as av from offers as o, student as s, job_profile as j where j.j_id = o.j_id and j.c_id = o.c_id and o.st_id = s.st_id and s.dept=\"BT\" and s.programme = \"BTECH\"")->queryRow();
		$avgB = $sql['av'];



		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from student where dept=\"BT\" and programme = \"MTECH\"")->queryRow();
		$totalRegM = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from offers as o, student as s where o.st_id = s.st_id and s.dept=\"BT\" and s.programme = \"MTECH\"")->queryRow();
		$totalOffersM = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from (select distinct(oTemp.st_id) from offers as oTemp) as o, student as s where o.st_id = s.st_id and s.dept=\"BT\" and s.programme = \"MTECH\"")->queryRow();
		$actualStudPlacedM = $sql['cnt'];

		if($totalRegM==0) $percentM=0;
		else $percentM = ($actualStudPlacedM*100)/$totalRegM;

		$sql =  Yii::app()->db->createCommand("select avg(j.ctc) as av from offers as o, student as s, job_profile as j where j.j_id = o.j_id and j.c_id = o.c_id and o.st_id = s.st_id and s.dept=\"BT\" and s.programme = \"MTECH\"")->queryRow();
		$avgM = $sql['av'];

		$this->render('bt',array(
			'totalRegB'=>$totalRegB,
			'totalOffersB'=>$totalOffersB,
			'actualStudPlacedB'=>$actualStudPlacedB,
			'percentB'=>$percentB,
			'avgB'=>$avgB,
			'totalRegM'=>$totalRegM,
			'totalOffersM'=>$totalOffersM,
			'actualStudPlacedM'=>$actualStudPlacedM,
			'percentM'=>$percentM,
			'avgM'=>$avgM,
			
		));
	}

	public function actiondod()
	{
		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from student where dept=\"DOD\" and programme = \"BTECH\"")->queryRow();
		$totalRegB = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from offers as o, student as s where o.st_id = s.st_id and s.dept=\"DOD\" and s.programme = \"BTECH\"")->queryRow();
		$totalOffersB = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from (select distinct(oTemp.st_id) from offers as oTemp) as o, student as s where o.st_id = s.st_id and s.dept=\"DOD\" and s.programme = \"BTECH\"")->queryRow();
		$actualStudPlacedB = $sql['cnt'];

		if($totalRegB==0) $percentB=0;
		else $percentB = ($actualStudPlacedB*100)/$totalRegB;

		$sql =  Yii::app()->db->createCommand("select avg(j.ctc) as av from offers as o, student as s, job_profile as j where j.j_id = o.j_id and j.c_id = o.c_id and o.st_id = s.st_id and s.dept=\"DOD\" and s.programme = \"BTECH\"")->queryRow();
		$avgB = $sql['av'];



		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from student where dept=\"DOD\" and programme = \"MTECH\"")->queryRow();
		$totalRegM = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from offers as o, student as s where o.st_id = s.st_id and s.dept=\"DOD\" and s.programme = \"MTECH\"")->queryRow();
		$totalOffersM = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from (select distinct(oTemp.st_id) from offers as oTemp) as o, student as s where o.st_id = s.st_id and s.dept=\"DOD\" and s.programme = \"MTECH\"")->queryRow();
		$actualStudPlacedM = $sql['cnt'];

		if($totalRegM==0) $percentM=0;
		else $percentM = ($actualStudPlacedM*100)/$totalRegM;

		$sql =  Yii::app()->db->createCommand("select avg(j.ctc) as av from offers as o, student as s, job_profile as j where j.j_id = o.j_id and j.c_id = o.c_id and o.st_id = s.st_id and s.dept=\"DOD\" and s.programme = \"MTECH\"")->queryRow();
		$avgM = $sql['av'];

		$this->render('dod',array(
			'totalRegB'=>$totalRegB,
			'totalOffersB'=>$totalOffersB,
			'actualStudPlacedB'=>$actualStudPlacedB,
			'percentB'=>$percentB,
			'avgB'=>$avgB,
			'totalRegM'=>$totalRegM,
			'totalOffersM'=>$totalOffersM,
			'actualStudPlacedM'=>$actualStudPlacedM,
			'percentM'=>$percentM,
			'avgM'=>$avgM,
			
		));
	}

	public function actionme()
	{
		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from student where dept=\"ME\" and programme = \"BTECH\"")->queryRow();
		$totalRegB = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from offers as o, student as s where o.st_id = s.st_id and s.dept=\"ME\" and s.programme = \"BTECH\"")->queryRow();
		$totalOffersB = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from (select distinct(oTemp.st_id) from offers as oTemp) as o, student as s where o.st_id = s.st_id and s.dept=\"ME\" and s.programme = \"BTECH\"")->queryRow();
		$actualStudPlacedB = $sql['cnt'];

		if($totalRegB==0) $percentB=0;
		else $percentB = ($actualStudPlacedB*100)/$totalRegB;

		$sql =  Yii::app()->db->createCommand("select avg(j.ctc) as av from offers as o, student as s, job_profile as j where j.j_id = o.j_id and j.c_id = o.c_id and o.st_id = s.st_id and s.dept=\"ME\" and s.programme = \"BTECH\"")->queryRow();
		$avgB = $sql['av'];



		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from student where dept=\"ME\" and programme = \"MTECH\"")->queryRow();
		$totalRegM = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from offers as o, student as s where o.st_id = s.st_id and s.dept=\"ME\" and s.programme = \"MTECH\"")->queryRow();
		$totalOffersM = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from (select distinct(oTemp.st_id) from offers as oTemp) as o, student as s where o.st_id = s.st_id and s.dept=\"ME\" and s.programme = \"MTECH\"")->queryRow();
		$actualStudPlacedM = $sql['cnt'];

		if($totalRegM==0) $percentM=0;
		else $percentM = ($actualStudPlacedM*100)/$totalRegM;

		$sql =  Yii::app()->db->createCommand("select avg(j.ctc) as av from offers as o, student as s, job_profile as j where j.j_id = o.j_id and j.c_id = o.c_id and o.st_id = s.st_id and s.dept=\"ME\" and s.programme = \"MTECH\"")->queryRow();
		$avgM = $sql['av'];

		$this->render('me',array(
			'totalRegB'=>$totalRegB,
			'totalOffersB'=>$totalOffersB,
			'actualStudPlacedB'=>$actualStudPlacedB,
			'percentB'=>$percentB,
			'avgB'=>$avgB,
			'totalRegM'=>$totalRegM,
			'totalOffersM'=>$totalOffersM,
			'actualStudPlacedM'=>$actualStudPlacedM,
			'percentM'=>$percentM,
			'avgM'=>$avgM,
			
		));
	}

	public function actioncst()
	{
		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from student where dept=\"CST\" and programme = \"BTECH\"")->queryRow();
		$totalRegB = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from offers as o, student as s where o.st_id = s.st_id and s.dept=\"CST\" and s.programme = \"BTECH\"")->queryRow();
		$totalOffersB = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from (select distinct(oTemp.st_id) from offers as oTemp) as o, student as s where o.st_id = s.st_id and s.dept=\"CST\" and s.programme = \"BTECH\"")->queryRow();
		$actualStudPlacedB = $sql['cnt'];

		if($totalRegB==0) $percentB=0;
		else $percentB = ($actualStudPlacedB*100)/$totalRegB;

		$sql =  Yii::app()->db->createCommand("select avg(j.ctc) as av from offers as o, student as s, job_profile as j where j.j_id = o.j_id and j.c_id = o.c_id and o.st_id = s.st_id and s.dept=\"CST\" and s.programme = \"BTECH\"")->queryRow();
		$avgB = $sql['av'];



		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from student where dept=\"CST\" and programme = \"MTECH\"")->queryRow();
		$totalRegM = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from offers as o, student as s where o.st_id = s.st_id and s.dept=\"CST\" and s.programme = \"MTECH\"")->queryRow();
		$totalOffersM = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from (select distinct(oTemp.st_id) from offers as oTemp) as o, student as s where o.st_id = s.st_id and s.dept=\"CST\" and s.programme = \"MTECH\"")->queryRow();
		$actualStudPlacedM = $sql['cnt'];

		if($totalRegM==0) $percentM=0;
		else $percentM = ($actualStudPlacedM*100)/$totalRegM;

		$sql =  Yii::app()->db->createCommand("select avg(j.ctc) as av from offers as o, student as s, job_profile as j where j.j_id = o.j_id and j.c_id = o.c_id and o.st_id = s.st_id and s.dept=\"CST\" and s.programme = \"MTECH\"")->queryRow();
		$avgM = $sql['av'];

		$this->render('cst',array(
			'totalRegB'=>$totalRegB,
			'totalOffersB'=>$totalOffersB,
			'actualStudPlacedB'=>$actualStudPlacedB,
			'percentB'=>$percentB,
			'avgB'=>$avgB,
			'totalRegM'=>$totalRegM,
			'totalOffersM'=>$totalOffersM,
			'actualStudPlacedM'=>$actualStudPlacedM,
			'percentM'=>$percentM,
			'avgM'=>$avgM,
			
		));
	}

	public function actionhss()
	{
		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from student where dept=\"HSS\" and programme = \"BTECH\"")->queryRow();
		$totalRegB = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from offers as o, student as s where o.st_id = s.st_id and s.dept=\"HSS\" and s.programme = \"BTECH\"")->queryRow();
		$totalOffersB = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from (select distinct(oTemp.st_id) from offers as oTemp) as o, student as s where o.st_id = s.st_id and s.dept=\"HSS\" and s.programme = \"BTECH\"")->queryRow();
		$actualStudPlacedB = $sql['cnt'];

		if($totalRegB==0) $percentB=0;
		else $percentB = ($actualStudPlacedB*100)/$totalRegB;

		$sql =  Yii::app()->db->createCommand("select avg(j.ctc) as av from offers as o, student as s, job_profile as j where j.j_id = o.j_id and j.c_id = o.c_id and o.st_id = s.st_id and s.dept=\"HSS\" and s.programme = \"BTECH\"")->queryRow();
		$avgB = $sql['av'];



		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from student where dept=\"HSS\" and programme = \"MTECH\"")->queryRow();
		$totalRegM = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from offers as o, student as s where o.st_id = s.st_id and s.dept=\"HSS\" and s.programme = \"MTECH\"")->queryRow();
		$totalOffersM = $sql['cnt'];

		$sql =  Yii::app()->db->createCommand("select count(*) as cnt from (select distinct(oTemp.st_id) from offers as oTemp) as o, student as s where o.st_id = s.st_id and s.dept=\"HSS\" and s.programme = \"MTECH\"")->queryRow();
		$actualStudPlacedM = $sql['cnt'];

		if($totalRegM==0) $percentM=0;
		else $percentM = ($actualStudPlacedM*100)/$totalRegM;

		$sql =  Yii::app()->db->createCommand("select avg(j.ctc) as av from offers as o, student as s, job_profile as j where j.j_id = o.j_id and j.c_id = o.c_id and o.st_id = s.st_id and s.dept=\"HSS\" and s.programme = \"MTECH\"")->queryRow();
		$avgM = $sql['av'];

		$this->render('hss',array(
			'totalRegB'=>$totalRegB,
			'totalOffersB'=>$totalOffersB,
			'actualStudPlacedB'=>$actualStudPlacedB,
			'percentB'=>$percentB,
			'avgB'=>$avgB,
			'totalRegM'=>$totalRegM,
			'totalOffersM'=>$totalOffersM,
			'actualStudPlacedM'=>$actualStudPlacedM,
			'percentM'=>$percentM,
			'avgM'=>$avgM,
			
		));
	}
}