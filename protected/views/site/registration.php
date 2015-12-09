<?php
/* @var $this SiteController */
/* @var $model User */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Регистрация';
$this->breadcrumbs=array(
	'Регистрация',
);
?>

<h1>Регистрация</h1>

<p>Введите данные о себе:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'registration-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Поля со <span class="required">*</span> обязательны.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'confirm'); ?>
		<?php echo $form->passwordField($model,'confirm'); ?>
		<?php echo $form->error($model,'confirm'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
        
        <div class="row form_errors">
            <?php echo $form->errorSummary($model); ?>
        </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Отправить'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
