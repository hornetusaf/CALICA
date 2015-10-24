<?php
/* @var $this RegistroSalidaController */
/* @var $model RegistroSalida */

$this->breadcrumbs=array(
	'Salidas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Salidas', 'url'=>array('index')),
	array('label'=>'Gestionar Salidas', 'url'=>array('admin')),
);
?>

<h1>Crear Salida</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>