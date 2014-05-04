<?php
/* @var $this PlacementRepController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'Job Profiles',
);

/*$this->menu=array(
	array('label'=>'Update Details', 'url'=>array('update', 'id'=>$model->pr_id)),
	array('label'=>'View Placement Reps', 'url'=>array('viewAll')),
);*/
?>

<h1>Job Profiles</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_allotJobView',
)); ?>
