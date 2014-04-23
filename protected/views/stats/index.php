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

<h1>Overall Statistics</h1>

<div class="view">
	<b><?php echo CHtml::encode("Total no. of Registered students"); ?>:</b>
	<?php echo CHtml::encode($totalReg); ?>
	<br />

	<b><?php echo CHtml::encode("Total No. of offers"); ?>:</b>
	<?php echo CHtml::encode($totalOffers); ?>
	<br />

	<b><?php echo CHtml::encode("Actual no. of students placed"); ?>:</b>
	<?php echo CHtml::encode($actualStudPlaced); ?>
	<br />

	<b><?php echo CHtml::encode("Percentage Placed"); ?>:</b>
	<?php echo CHtml::encode($percent); ?>
	<br />

	<b><?php echo CHtml::encode("Avg salary for BTech"); ?>:</b>
	<?php echo CHtml::encode($btechAvg); ?>
	<br />

	<b><?php echo CHtml::encode("Avg salary for MTech"); ?>:</b>
	<?php echo CHtml::encode($mtechAvg); ?>
	<br />

	<b><?php echo CHtml::encode("Overall Avg salary"); ?>:</b>
	<?php echo CHtml::encode($overallAvg); ?>
	<br />
</div>

