<?php
/* @var $this WarrantyController */
/* @var $data Warranty */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dev_id')); ?>:</b>
	<?php echo CHtml::encode($data->dev_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dt_start')); ?>:</b>
	<?php echo CHtml::encode($data->dt_start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('period')); ?>:</b>
	<?php echo CHtml::encode($data->period); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dt_end')); ?>:</b>
	<?php echo CHtml::encode($data->dt_end); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>