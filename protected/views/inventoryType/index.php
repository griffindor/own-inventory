<?php
/* @var $this InventoryTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Inventory Types',
);

$this->menu=array(
	array('label'=>'Create InventoryType', 'url'=>array('create')),
	array('label'=>'Manage InventoryType', 'url'=>array('admin')),
);
?>

<h1>Inventory Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
