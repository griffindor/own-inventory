<?php
/* @var $this PersonController */
/* @var $model Person */

$this->breadcrumbs=array(
	'Сотрудники'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Список сотрудников', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1><?php echo Person::getName($model->id);?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>