<?php
/* @var $this InventoryTypeController */
/* @var $model InventoryType */

$this->breadcrumbs=array(
	'Inventory Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List InventoryType', 'url'=>array('index')),
	array('label'=>'Create InventoryType', 'url'=>array('create')),
	array('label'=>'Update InventoryType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete InventoryType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage InventoryType', 'url'=>array('admin')),
);
?>

<h1>View InventoryType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
