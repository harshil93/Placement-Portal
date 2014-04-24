<?php
/* @var $this LoginController */
/* @var $model Login */

$this->breadcrumbs=array(
	'Update',
);

$this->menu=array(
	array('label'=>'Create Login', 'url'=>array('create')),
	array('label'=>'View Login', 'url'=>array('view', 'id'=>$model->email_id)),
	array('label'=>'Manage Login', 'url'=>array('admin')),
);
?>

<h1>Update Login <?php echo $model->email_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>