<?php
/* @var $this DepartmentController */
/* @var $model Department */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'department-form',
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
		<?php echo $form->dropDownList($model,'company_id', Company::getList()); ?>
            	<?php echo $form->error($model,'company_id'); ?>
	</div>

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
        <?php $data = Department::createTree();
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
              $("#Department_parent_id").val($(this).attr('id'));
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

	<div class="row">
		<?php echo $form->labelEx($model,'lead_person_id'); ?>
		<?php 
                if(empty($model->department_id))
                    {
                        echo $form->dropDownList($model,'lead_person_id',array(null=>'Сначала выбери организацию')); 
                    }
                    else
                    {
                        echo $form->dropDownList($model,'lead_person_id', Person::getList()); 
                    }    
                ?>
		<?php echo $form->error($model,'lead_person_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
function updateTree(data)
{
    jQuery.ajax({
        'type':'POST',
        'url':'/scuko/index.php?r=company/getdepartments',
        'cache':false,
        'data':data,
        'success':function(json){
            $("#yw0").("<?php CTreeView::saveDataAsHtml($data);?>");  
            var arr=JSON.parse(json);
            var i = 0;
            for(i=0;i<arr.length;i++)
            {
                $( "#"+arr[i] ).remove();
            }
        }
    });
    return false;
}
jQuery('body').on('change','#Department_company_id',function(){
    var data = jQuery(this).parents("form").serialize();
    jQuery.ajax({
        'type':'POST',
        'url':'/scuko/index.php?r=company/getpersons',
        'cache':false,
        'data':data,
        'success':function(html){
            jQuery("#Department_lead_person_id").html(html);
            updateTree(data);
        }
    });
    return false;
});
jQuery("#yw0").treeview({});

</script>