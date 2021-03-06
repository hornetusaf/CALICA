<?php
/* @var $this CarreraDepartamentoController */
/* @var $model CarreraDepartamento */

$this->breadcrumbs=array(
	'Carreras / Departamentos'=>array('index'),
	$model->nombre=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Carreras / Departamentos', 'url'=>array('index')),
	array('label'=>'Crear Carrera / Departamento', 'url'=>array('create')),
	array('label'=>'Ver Carrera / Departamento', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gestionar Carreras / Departamentos', 'url'=>array('admin')),
);
?>

<h1>Actualizar Carrera / Departamento # <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
