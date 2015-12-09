<?php
/* @var $this ContractorController */
/* @var $model Contractor */

$this->breadcrumbs=array(
	'Подрядчики'=>array('index'),
	'Новый',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Новый подрядчик</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>