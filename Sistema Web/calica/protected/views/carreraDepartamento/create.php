<?php
/* @var $this CarreraDepartamentoController */
/* @var $model CarreraDepartamento */

$this->breadcrumbs=array(
	'Carreras / Departamentos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Carrera / Departamento', 'url'=>array('index')),
	array('label'=>'Gestionar Carrera / Departamento', 'url'=>array('admin')),
);
?>

<h1>Crear Carrera / Departamento</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>