<?php

    echo "<pre>";
    print_r($model);
    echo "</pre>";

    $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'c_id',
        'j_id',
        'st_id'
    ),
)); ?>