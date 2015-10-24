<?php
/* @var $this HorarioController */
/* @var $model Horario */

$this->breadcrumbs=array(
	'Horarios'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Horarios', 'url'=>array('index')),
	array('label'=>'Crear Horario', 'url'=>array('create')),
	array('label'=>'Ver Horario', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gestionar Horarios', 'url'=>array('admin')),
);
?>

<h1>Actualizar Horario # <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>