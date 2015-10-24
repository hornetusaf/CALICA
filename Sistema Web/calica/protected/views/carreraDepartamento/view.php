<?php
/* @var $this CarreraDepartamentoController */
/* @var $model CarreraDepartamento */

$this->breadcrumbs=array(
	'Carreras / Departamentos'=>array('index'),
	$model->nombre,
);

$this->menu=array(
	array('label'=>'Listar Carreras / Departamentos', 'url'=>array('index')),
	array('label'=>'Crear Carrera / Departamento', 'url'=>array('create')),
	array('label'=>'Actualizar Carrera / Departamento', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Carrera / Departamento', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Carreras / Departamentos', 'url'=>array('admin')),
);
?>

<h1>Ver Carrera / Departamento # <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'descripcion',
	),
)); ?>
