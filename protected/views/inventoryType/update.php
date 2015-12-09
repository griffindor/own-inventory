<?php
/* @var $this InventoryTypeController */
/* @var $model InventoryType */

$this->breadcrumbs=array(
	'Inventory Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List InventoryType', 'url'=>array('index')),
	array('label'=>'Create InventoryType', 'url'=>array('create')),
	array('label'=>'View InventoryType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage InventoryType', 'url'=>array('admin')),
);
?>

<h1>Update InventoryType <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>