<?php
/* @var $this RegistroSalidaController */
/* @var $model RegistroSalida */

$this->breadcrumbs=array(
	'Salidas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Salidas', 'url'=>array('index')),
	//array('label'=>'Crear Salida', 'url'=>array('create')),
	array('label'=>'Ver Salida', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gestionar Salidas', 'url'=>array('admin')),
);
?>

<h1>Actualizar Salida <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>