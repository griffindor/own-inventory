<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Допро пожаловать в <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<h1>Система Централизированого Учета Компьютерного Оборудования</h1>

<?php 
    if(!Yii::app()->user->isGuest&&Yii::app()->user->role!=='3'):
?>
<p>Ссылка на подключение дочерних предприятий: <?php $url=  Company::getRefLink(Yii::app()->user->id); $string=empty($url)?"не доступно":$url; echo $string;?></p>
<?php endif;?>


