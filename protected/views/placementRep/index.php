<?php
/* @var $this PlacementRepController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Placement Reps',
);

$this->menu=array(
	array('label'=>'Update Details', 'url'=>array('update', 'pr_id'=>Yii::app()->user->id)),
	array('label'=>'View Placement Reps', 'url'=>array('viewAll')),
	array('label'=>'View Companies', 'url'=>array('viewCompanies')),
	array('label'=>'View Job Profiles', 'url'=>array('viewAll')),
	array('label'=>'View Applications', 'url'=>array('viewAll')),
);
?>

<h1>Placement Reps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_viewAll',
)); ?>
