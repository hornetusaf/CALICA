<?php
/* @var $this ParametrosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Parámetros',
);

$this->menu=array(
	array('label'=>'Crear Parámetro', 'url'=>array('create')),
	array('label'=>'Gestionar Parámetros', 'url'=>array('admin')),
);
?>

<h1>Parámetros</h1>

<?php 
$dataProvider->sort->defaultOrder='id DESC';
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
