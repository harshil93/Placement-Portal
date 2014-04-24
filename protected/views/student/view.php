<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs=array(
	$model->name,
);

if(Yii::app()->session['role'] == 0){
    $this->menu=array(
        array('label'=>'Create Student', 'url'=>array('create')),
        array('label'=>'Update Student', 'url'=>array('update', 'id'=>$model->st_id)),
        array('label'=>'Delete Student', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->st_id),'confirm'=>'Are you sure you want to delete this item?')),
        array('label'=>'Manage Student', 'url'=>array('admin')),
    );
}

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
