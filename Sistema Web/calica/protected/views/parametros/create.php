<?php
/* @var $this ParametrosController */
/* @var $model Parametros */

$this->breadcrumbs=array(
	'Parámetros'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Parámetros', 'url'=>array('index')),
	array('label'=>'Gestionar Parámetros', 'url'=>array('admin')),
);
?>

<h1>Crear Parámetro</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>