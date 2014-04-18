<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Company Register';
$this->breadcrumbs=array(
    'Company Register',
);
?>

<h1>Company Registration Form</h1>

<p>Please fill out the following form with your details:</p>

<?php $this->renderPartial('_regCompanyForm', array('modelLogin'=>$modelLogin , 'modelCompany'=> $modelCompany)); ?>



</div><!-- form -->
