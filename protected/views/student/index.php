<?php
/* @var $this StudentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Students',
);

$this->menu=array(
	array('label'=>'View Jobs', 'url'=>array('viewjobs')),
	array('label'=>'View Offers', 'url'=>array('viewoffers')),
    array('label'=>'Upload CV','url'=>array('cvTable/create')),
);
?>

<h1>Students</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
