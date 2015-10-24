<?php
/* @var $this TipoUsuarioController */
/* @var $model TipoUsuario */

$this->breadcrumbs=array(
	'Tipos de Usuario'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Tipos de Usuarios', 'url'=>array('index')),
	array('label'=>'Gestionar Tipos de Usuarios', 'url'=>array('admin')),
);
?>

<h1>Crear Tipo de Usuario</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>