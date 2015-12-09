<?php
/* @var $this InventoryTypeController */
/* @var $model InventoryType */

$this->breadcrumbs=array(
	'Inventory Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List InventoryType', 'url'=>array('index')),
	array('label'=>'Manage InventoryType', 'url'=>array('admin')),
);
?>

<h1>Create InventoryType</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>