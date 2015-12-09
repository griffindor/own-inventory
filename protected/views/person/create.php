<?php
/* @var $this PersonController */
/* @var $model Person */

$this->breadcrumbs=array(
	'Сотрудники'=>array('index'),
	'Новый',
);

$this->menu=array(
	array('label'=>'Список сотрудников', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Новый сотрудник</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>