<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Восстановление пароля';
$this->breadcrumbs=array(
	'Восстановление пароля',
);
?>

<h1>Восстановление пароля</h1>

<p>Введите свои данные:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'password_restore',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'old_password'); ?>
		<?php echo $form->passwordField($model,'old_password'); ?>
		<?php echo $form->error($model,'old_password'); ?>
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
	
        <div class="row buttons">
		<?php echo CHtml::submitButton('Сменить пароль'); ?>
        </div>

<?php $this->endWidget(); ?>
</div><!-- form -->

