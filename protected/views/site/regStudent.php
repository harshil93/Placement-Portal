<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Student Register';
$this->breadcrumbs=array(
    'Student Register',
);
?>

<h1>Student Registration Form</h1>

<p>Please fill out the following form with your details:</p>

<?php $this->renderPartial('_regStudentForm', array('modelLogin'=>$modelLogin , 'modelStudent'=> $modelStudent)); ?>



</div><!-- form -->
