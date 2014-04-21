<?php
/* @var $this AdminController */

$this->breadcrumbs=array(
	'Admin',
);
?>

<?php
$this->menu=array(
array('label'=>'Manage Students', 'url'=>array('student/admin')),
array('label'=>'Manage Companies', 'url'=>array('company/admin')),
array('label'=>'Manage Placement Rep', 'url'=>array('placementRep/admin')),
array('label'=>'Manage Logins', 'url'=>array('login/admin')),
//software
);
?>