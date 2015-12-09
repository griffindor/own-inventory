<?php
/* @var $this PersonController */
/* @var $model Person */

$this->breadcrumbs=array(
	'Сотрудники'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Список сотрудников', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#person-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление сотрудниками</h1>


<?php $this->widget('application.extensions.tablesorter.Sorter', array(
    'data'=>$records,
    'columns'=>array(
        'last_name',
        'first_name',
        'middle_name',
        'status',
        'position'
    )
)); ?>
