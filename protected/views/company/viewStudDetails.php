<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs=array(
	'Student Details',
);
?>

<h1>View Student #<?php echo $model->st_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'roll_no',
		'st_id',
		'name',
		'gender',
		'cpi',
		'dept',
		'programme',
		'category',
		'phone_no',
		'current_address',
		'home_address',
	),
)); ?>
