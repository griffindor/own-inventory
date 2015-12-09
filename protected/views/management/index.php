<?php
/* @var $this DeviceController */
/* @var $model Device */



$this->menu=array(
	array('label'=>'Организации', 'url'=>array('company/index')),
	array('label'=>'Подразделения', 'url'=>array('department/index')),
	array('label'=>'Сотрудники', 'url'=>array('person/index')),
	array('label'=>'Подрядчики', 'url'=>array('contractor/index')),
);
?>

<h1>Модуль управления</h1>

<p>Здесь можно управлять организациями, подразделениями, сотрудниками и подрядчиками.</p>