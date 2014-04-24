<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs=array(
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Student', 'url'=>array('admin')),
);
?>

<h1>Create Student</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>