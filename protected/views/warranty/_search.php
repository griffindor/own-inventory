<?php
/* @var $this WarrantyController */
/* @var $model Warranty */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dev_id'); ?>
		<?php echo $form->textField($model,'dev_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dt_start'); ?>
		<?php echo $form->textField($model,'dt_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'period'); ?>
		<?php echo $form->textField($model,'period'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dt_end'); ?>
		<?php echo $form->textField($model,'dt_end'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->