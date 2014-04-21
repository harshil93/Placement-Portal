<?php
/* @var $this PlacementRepController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'View Offers',
);

/*$this->menu=array(
	array('label'=>'Update Details', 'url'=>array('update', 'id'=>$model->pr_id)),
	array('label'=>'View Placement Reps', 'url'=>array('viewAll')),
);*/
?>

<h1>Your Job Offers</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_viewOffers',
)); ?>
