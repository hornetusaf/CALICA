<?php
/* @var $this RegistroEntradaController */
/* @var $model RegistroEntrada */

$this->breadcrumbs=array(
	'Entradas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Entradas', 'url'=>array('index')),
	array('label'=>'Gestionar Entradas', 'url'=>array('admin')),
);
?>

<h1>Crear Entrada</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>