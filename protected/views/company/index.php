<?php
/* @var $this CompanyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Companies',
);

$this->menu=array(
	array('label'=>'View Job Profiles', 'url'=>array('company/viewjobprofiles')),
	array('label'=>'Create Job Profile', 'url'=>array('jobProfile/create')),
	array('label'=>'Offers Given', 'url'=>array('offer/view')),
);
?>

<h1>Welcome <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
