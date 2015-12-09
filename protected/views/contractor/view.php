<?php
/* @var $this ContractorController */
/* @var $model Contractor */

$this->breadcrumbs=array(
	'Подрядчики'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
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
		'name',
		'adress',
		'email',
		'phone',
		'fax',
		'web',
		'desc',
	),
)); ?>
