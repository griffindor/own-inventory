<?php
/* @var $this CompanyController */
/* @var $model Company */

$this->breadcrumbs=array(
	'Организации'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Список организаций', 'url'=>array('index')),
	array('label'=>'Создать организацию', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#company-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление организациями</h1>



<?php $this->widget('application.extensions.tablesorter.Sorter', array(
    'data'=>$records,
    'columns'=>array(
        'name',
        'desc',
        'adress',
        'email', 
        'phone',
        'fax',
        'web',
    )
));
?>