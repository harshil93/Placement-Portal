<?php
/* @var $this CompanyController */
/* @var $model Company */

$this->breadcrumbs=array(
	$model->name,
);
if(Yii::app()->session['role'] == 0){
    $this->menu=array(
        array('label'=>'Create Company', 'url'=>array('create')),
        array('label'=>'Update Company', 'url'=>array('update', 'id'=>$model->c_id)),
        array('label'=>'Delete Company', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->c_id),'confirm'=>'Are you sure you want to delete this item?')),
        array('label'=>'Manage Company', 'url'=>array('admin')),
    );
}
?>

<h1>View Company #<?php echo $model->c_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'c_id',
		'name',
		'details',
		'phone_no',
		'email_id',
	),
)); ?>
