<?php
/* @var $this PersonController */
/* @var $model Person */

$this->breadcrumbs=array(
	'Сотрудники'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Список сотрудников', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Изменить', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1><?php echo Person::getName($model->id); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'first_name',
		'middle_name',
		'last_name',
                array(               // related city displayed as a link
                    'label'=>'Подразделение',
                    'type'=>'raw',
                    'value'=>!empty($model->department_id)?CHtml::encode($model->department->name):'Not Set',
                ),
		
                array(
                    'label'=>'Организация',
                    'value'=> CHtml::encode($model->company->name),
                ),
                array(
                    'label'=>'Пользователь',
                    'value'=> !empty($model->user->username)?CHtml::encode($model->user->username):'Not Set',
                ),
                'status',
		'position',
	)
)); ?>
