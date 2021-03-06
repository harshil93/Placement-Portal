<?php
/* @var $this LoginController */
/* @var $model Login */

$this->breadcrumbs=array(
	$model->email_id,
);

$this->menu=array(
	array('label'=>'Create Login', 'url'=>array('create')),
	array('label'=>'Update Login', 'url'=>array('update', 'id'=>$model->email_id)),
	array('label'=>'Delete Login', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->email_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Login', 'url'=>array('admin')),
);
?>

<h1>View Login #<?php echo $model->email_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'email_id',
		'level',
		'password',
	),
)); ?>
