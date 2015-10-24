<?php
/* @var $this RegistroEntradaController */
/* @var $model RegistroEntrada */

$this->breadcrumbs=array(
	'Registro Entradas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Entradas', 'url'=>array('index')),
	//array('label'=>'Crear Entrada', 'url'=>array('create')),
	array('label'=>'Ver Entrada', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gestionar Entradas', 'url'=>array('admin')),
);
?>

<h1>Actualizar Entrada <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>