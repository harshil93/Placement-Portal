<?php
/**
 * Created by PhpStorm.
 * User: harshil
 * Date: 18/04/14
 * Time: 12:10
 */
?>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataprovider,
    'itemView'=>'_jobProfile',
)); ?>