<?php
/* @var $this InventoryController */
/* @var $model Inventory */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'inventory-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'company_id'); ?>
		<?php echo $form->textField($model,'company_id'); ?>
		<?php echo $form->error($model,'company_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'department_id'); ?>
		<?php echo $form->textField($model,'department_id'); ?>
		<?php echo $form->error($model,'department_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'person_id'); ?>
		<?php echo $form->textField($model,'person_id'); ?>
		<?php echo $form->error($model,'person_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inventory_type_id'); ?>
		<?php echo $form->textField($model,'inventory_type_id'); ?>
		<?php echo $form->error($model,'inventory_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dt_start'); ?>
		<?php echo $form->textField($model,'dt_start'); ?>
		<?php echo $form->error($model,'dt_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dt_end'); ?>
		<?php echo $form->textField($model,'dt_end'); ?>
		<?php echo $form->error($model,'dt_end'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'result'); ?>
		<?php echo $form->textField($model,'result'); ?>
		<?php echo $form->error($model,'result'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->