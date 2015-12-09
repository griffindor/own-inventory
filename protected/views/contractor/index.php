<?php
/* @var $this ContractorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Подрядчики',
);

$this->menu=array(
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Подрядчики</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
