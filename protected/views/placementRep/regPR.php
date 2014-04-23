<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Placement Rep Register';
$this->breadcrumbs=array(
    'Placement Rep Register',
);
?>

<h1>Student Registration Form</h1>

<p>Please fill out the following form with your details:</p>

<?php $this->renderPartial('_regPRForm', array('modelLogin'=>$modelLogin , 'modelPR'=> $modelPR)); ?>



</div><!-- form -->
