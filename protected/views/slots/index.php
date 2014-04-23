<?php
/* @var $this SlotsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Slots',
);

$this->menu=array(
	array('label'=>'Create Slots', 'url'=>array('create')),
	array('label'=>'Manage Slots', 'url'=>array('admin')),
);
?>

<h1>Slots</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
