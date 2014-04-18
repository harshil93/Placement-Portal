<?php
$this->menu=array(
    array('label'=>'List Result', 'url'=>array('index')),
    array('label'=>'Create Result', 'url'=>array('create')),
    array('label'=>'Update Result', 'url'=>array('update', 'j_id'=>$model->j_id, 'c_id'=>$model->c_id)),
    array('label'=>'Delete Result', 'url'=>'delete',
        'linkOptions'=>array('submit'=>array('delete',
            'j_id'=>$model->j_id, 'c_id'=>$model->c_id),
            'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Manage Result', 'url'=>array('admin')),
);

?>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'c_id',
        'j_id',
        'ctc',
        'deadline',
        'description',
    ),
)); ?>