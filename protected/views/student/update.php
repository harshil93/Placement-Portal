<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs=array(
	'Students'=>array('index'),
	$model->name=>array('view','id'=>$model->st_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Student', 'url'=>array('index')),
	array('label'=>'Create Student', 'url'=>array('create')),
	array('label'=>'View Student', 'url'=>array('view', 'id'=>$model->st_id)),
	array('label'=>'Manage Student', 'url'=>array('admin')),
);
?>

<h1>Update Student <?php echo $model->st_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>