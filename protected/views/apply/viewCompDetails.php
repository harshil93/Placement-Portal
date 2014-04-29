<?php
/* @var $this CompanyController */
/* @var $model Company */

$this->breadcrumbs=array(
    'Student',
);
?>

<h1>View Company #<?php echo $model->c_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'c_id',
        'cname',
        'details',
        'phone_no',
        'email_id',
    ),
)); ?>
