<?php
$form = $this->beginWidget(
    'CActiveForm',
    array(
        'id' => 'upload-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )
);
// ...
echo $form->labelEx($model, 'Upload Your CV');echo "<br>";

echo $form->fileField($model, 'cv_name');echo "<br>";
echo $form->error($model, 'cv_name');echo "<br>";

echo CHtml::submitButton('Submit');
$this->endWidget();

?>