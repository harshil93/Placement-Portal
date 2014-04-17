<?php
/**
 * Created by PhpStorm.
 * User: harshil
 * Date: 17/04/14
 * Time: 22:38
 */

$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'resultgrid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'j_id',
        'c_id',
        'dept',
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{update}{delete}',
            'buttons'=>array
            (
                'view' => array
                (
                    'url'=>
                        'Yii::app()->createUrl("jobProfile/view/",
                        array("j_id"=>$data->j_id, "c_id"=>$data->c_id
                        ))',
                ),
                'update' => array
                (
                    'url'=>
                        'Yii::app()->createUrl("jobProfile/update/",
                        array("j_id"=>$data->j_id, "c_id"=>$data->c_id
                        ))',
                ),
                'delete'=> array
                (
                    'url'=>
                        'Yii::app()->createUrl("jobProfile/delete/",
                        array("j_id"=>$data->j_id, "c_id"=>$data->c_id
                        ))',
                ),
            ),
        ),
    ),
));