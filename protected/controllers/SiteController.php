<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		
		if(Yii::app()->session['role'] == 1){
			$this->redirect(array('student/index'));
		}else if(Yii::app()->session['role'] == 2){
			$this->redirect(array('company/index'));
		}else if(Yii::app()->session['role'] == 3){
			$this->redirect(array('placementRep/index'));
		}
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

    public function actionTest(){
        $username = "lodhi.harshil@gmail.com";
        $connection = Yii::App()->db;
        $sql = "select email_id,password from login where email_id = :email_id";
        $users = $connection->createCommand($sql)->bindValue('email_id',$username)->queryRow();
        var_dump($users);
    }

    public function actionRegisterStudent(){
        $modelLogin = new Login;
        $modelStudent = new Student;

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='student-form')
        {
            echo CActiveForm::validate($modelLogin);
            echo CActiveForm::validate($modelStudent);
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['Login']) && isset($_POST['Student']))
        {

            $modelLogin->attributes=$_POST['Login'];
            $modelStudent->attributes = $_POST['Student'];
            $modelLogin->level = 1;
            $modelLogin->password = md5($modelLogin->password);

            $transaction = $modelLogin->dbConnection->beginTransaction();
            try{
                $modelLogin->save();
                $id =  Yii::app()->db->getLastInsertID();
                $modelStudent->st_id = intval($id);
                $modelStudent->save();
                $transaction->commit();
                Yii::app()->user->setFlash('success','Registration Successfull');
                $this->redirect(array('site/login'));
                }catch (Exception $e){
                    $transaction->rollback();
                    Yii::app()->user->setFlash('error','Insertion Error');
                }


        }

        $this->render('regStudent',array('modelLogin'=>$modelLogin, 'modelStudent'=>$modelStudent));


    }

    public function actionRegisterCompany(){
        $modelLogin = new Login;
        $modelCompany = new Company;

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='company-form')
        {
            echo CActiveForm::validate($modelLogin);
            echo CActiveForm::validate($modelCompany);
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['Login']) && isset($_POST['Company']))
        {

            $modelLogin->attributes=$_POST['Login'];
            $modelCompany->attributes = $_POST['Company'];
            $modelLogin->level = 2;
            $modelLogin->password = md5($modelLogin->password);

            $transaction = $modelLogin->dbConnection->beginTransaction();
            try{
                $modelLogin->save();
                $id =  Yii::app()->db->getLastInsertID();
                $modelCompany->c_id = intval($id);
                $modelCompany->save();
                $transaction->commit();
                Yii::app()->user->setFlash('success','Registration Successfull');
                $this->redirect(array('site/login'));
            }catch (Exception $e){
                $transaction->rollback();
                Yii::app()->user->setFlash('error','Insertion Error');
            }


        }

        $this->render('regCompany',array('modelLogin'=>$modelLogin, 'modelCompany'=>$modelCompany));


    }
}