<?php
/* @var $this ParametrosController */
/* @var $model Parametros */

$this->breadcrumbs=array(
	'Parámetros'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Parámetros', 'url'=>array('index')),
	array('label'=>'Crear Parámetro', 'url'=>array('create')),
	array('label'=>'Ver Parámetro', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gestionar Parámetros', 'url'=>array('admin')),
);
?>

<h1>Actualizar Parámetro # <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>