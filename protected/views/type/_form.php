<?php
/* @var $this TypeController */
/* @var $model Type */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'type-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля с <span class="required">*</span> обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_id'); ?>
		<?php echo $form->textField($model,'parent_id'); ?>
		<?php echo $form->error($model,'parent_id'); ?>
	</div>
        
        <div class="row">
        <?php $data = Type::createTree();
        $this->widget('CTreeView', array('data' => $data, 'htmlOptions' => array('class' => 'treeview-red')));

        ?>

        <script>
        $( "ul.treeview-red li" ).click(function( event ) {
          if(event.target.nodeName==='LI')
          {
              $("ul.treeview-red li").css({'color':'#00ff00'});
              $("ul.treeview-red li").removeClass('selected');
              $(this).css({'color':'red'});
              $(this).addClass('selected');
              $("#Type_parent_id").val($(this).attr('id'));
              return false;
          }
        });
        </script>
        </div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc'); ?>
		<?php echo $form->textArea($model,'desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'desc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->