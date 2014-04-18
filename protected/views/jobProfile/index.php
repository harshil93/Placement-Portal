<?php
/* @var $this JobProfileController */

$this->breadcrumbs=array(
	'Job Profile',
);
?>
<!--<h1><?php /*echo $this->id . '/' . $this->action->id; */?></h1>-->

<?php $this->widget('zii.widgets.CMenu',array(
    'items'=>array(
        array('label'=>'Create Job Profile', 'url'=>array('/jobProfile/create')),
        array('label'=>'View Job Profiles', 'url'=>array('/jobProfile/view')),
    ),
)); ?>

<?php
echo "<pre>";

echo "</pre>";
?>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataprovider,
    'itemView'=>'_view',
)); ?>