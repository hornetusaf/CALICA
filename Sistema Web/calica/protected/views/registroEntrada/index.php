<?php
/* @var $this RegistroEntradaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Entradas',
);

$this->menu=array(
	//array('label'=>'Crear Entrada', 'url'=>array('create')),
	array('label'=>'Gestionar Entradas', 'url'=>array('admin')),
);
?>

<h1>Registro de Entradas</h1>

<?php 
	$dataProvider->sort->defaultOrder='id DESC';
	$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
