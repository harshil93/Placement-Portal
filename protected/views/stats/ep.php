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


<h1>EP Statistics</h1>
<h2> BTECH </h2>
<div class="view">
	<b><?php echo CHtml::encode("Total no. of Registered students"); ?>:</b>
	<?php echo CHtml::encode($totalRegB); ?>
	<br />

	<b><?php echo CHtml::encode("Total No. of offers"); ?>:</b>
	<?php echo CHtml::encode($totalOffersB); ?>
	<br />

	<b><?php echo CHtml::encode("Actual no. of students placed"); ?>:</b>
	<?php echo CHtml::encode($actualStudPlacedB); ?>
	<br />

	<b><?php echo CHtml::encode("Percentage Placed"); ?>:</b>
	<?php echo CHtml::encode($percentB); ?>
	<br />

	<b><?php echo CHtml::encode("Avg salary for BTech"); ?>:</b>
	<?php echo CHtml::encode($avgB); ?>
	<br />


</div>

<br />
<h2> MTECH </h2>
<div class="view">
	<b><?php echo CHtml::encode("Total no. of Registered students"); ?>:</b>
	<?php echo CHtml::encode($totalRegM); ?>
	<br />

	<b><?php echo CHtml::encode("Total No. of offers"); ?>:</b>
	<?php echo CHtml::encode($totalOffersM); ?>
	<br />

	<b><?php echo CHtml::encode("Actual no. of students placed"); ?>:</b>
	<?php echo CHtml::encode($actualStudPlacedM); ?>
	<br />

	<b><?php echo CHtml::encode("Percentage Placed"); ?>:</b>
	<?php echo CHtml::encode($percentM); ?>
	<br />

	<b><?php echo CHtml::encode("Avg salary for MTech"); ?>:</b>
	<?php echo CHtml::encode($avgM); ?>
	<br />

</div>

