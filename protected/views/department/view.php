<?php
/* @var $this DepartmentController */
/* @var $model Department */

$this->breadcrumbs=array(
	'Подразделение'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список подразделений', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Изменить', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'company.name',
		'name',
		'parent_id',
		'desc',
		array(
                    'label' => 'Руководитель',
                    'value' => Person::getName($model->id)
                ),
	),
)); ?>
