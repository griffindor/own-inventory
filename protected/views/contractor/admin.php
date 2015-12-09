<?php
/* @var $this ContractorController */
/* @var $model Contractor */

$this->breadcrumbs=array(
	'Подрядчики'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#contractor-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление подрядчиками</h1>

<?php $this->widget('application.extensions.tablesorter.Sorter', array(
    'data'=>$records,
    'columns'=>array(
        'id',
        'name',
        'adress',
        'email', 
        'phone',
        'fax',
        'web',
    )
));
?>
