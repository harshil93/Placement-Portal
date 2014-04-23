<?php
/* @var $this PlacementRepController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Statistics',
);

$this->menu=array(
	array('label'=>'Company-wise Stats', 'url'=>array('companyWise')),
	array('label'=>'CSE', 'url'=>array('cse')),
	array('label'=>'MNC', 'url'=>array('mnc')),
	array('label'=>'EEE', 'url'=>array('eee')),
	array('label'=>'ECE', 'url'=>array('ece')),
	array('label'=>'CL', 'url'=>array('cl')),
	array('label'=>'CE', 'url'=>array('ce')),
	array('label'=>'EP', 'url'=>array('ep')),
	array('label'=>'BT', 'url'=>array('bt')),
	array('label'=>'DOD', 'url'=>array('dod')),
	array('label'=>'ME', 'url'=>array('me')),
	array('label'=>'CST', 'url'=>array('cst')),
	array('label'=>'HSS', 'url'=>array('hss')),

);
?>

<h1>Company Wise Statistics</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_companyWise',
)); ?>


