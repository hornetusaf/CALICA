<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->cedula=>array('view','id'=>$model->cedula),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Usuarios', 'url'=>array('index')),
	array('label'=>'Crear Usuario', 'url'=>array('create')),
	array('label'=>'Ver Usuario', 'url'=>array('view', 'id'=>$model->cedula)),
	array('label'=>'Gestionar Usuarios', 'url'=>array('admin')),
);
?>

<h1>Actualizar Usuario C.I.<?php echo $model->cedula; ?> <?php echo $model->nombres; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
