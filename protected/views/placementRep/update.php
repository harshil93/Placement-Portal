<?php
/* @var $this PlacementRepController */
/* @var $model PlacementRep */

$this->breadcrumbs=array(
	'Update',
);

$this->menu=array(
	array('label'=>'Create PlacementRep', 'url'=>array('create')),
	array('label'=>'View PlacementRep', 'url'=>array('view', 'pr_id'=>$model->pr_id)),
	array('label'=>'Manage PlacementRep', 'url'=>array('admin')),
);
?>

<h1>Update PlacementRep <?php echo $model->pr_id; ?></h1>

<?php $this->renderPartial('_updatePhone', array('model'=>$model)); ?>