<?php
/* @var $this ParametrosController */
/* @var $model Parametros */

$this->breadcrumbs=array(
	'Parámetros'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Parámetros', 'url'=>array('index')),
	array('label'=>'Crear Parámetro', 'url'=>array('create')),
	array('label'=>'Actualizar Parámetro', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Elimiar Parámetro', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Parámetros', 'url'=>array('admin')),
);
?>

<h1>Ver Parámetro <?php echo $model->nombre; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'texto',
		'texto_largo',
		'bool',
		'fecha',
		'hora',
		'entero',
		'decimal',
	),
)); ?>
