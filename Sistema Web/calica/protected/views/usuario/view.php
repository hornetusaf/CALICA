<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->cedula,
);

$this->menu=array(
	array('label'=>'Listar Usuarios', 'url'=>array('index')),
	array('label'=>'Crear Usuario', 'url'=>array('create')),
	array('label'=>'Actualizar Usuario', 'url'=>array('update', 'id'=>$model->cedula)),
	array('label'=>'Eliminar Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cedula),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Usuarios', 'url'=>array('admin')),
);
?>

<h1>Ver Usuario C.I.<?php echo $model->cedula; ?></h1>

<?php 
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cedula',
		'pin',
		'nombres',
		'apellidos',
		'email',
		'telefono',
		'usuario',
		'rfid',
		array(
				'name'=>'tipo_usuario_id',
				'type'=>'raw',
				'value'=>CHtml::link($model->tipoUsuario->nombre, '/calica/tipoUsuario/'.$model->tipo_usuario_id),
			),
		array(
				'name'=>'carrera_departamento_id',
				'type'=>'raw',
				'value'=>CHtml::link($model->carreraDepartamento->nombre, '/calica/carreraDepartamento/'.$model->carrera_departamento_id),
			),
	),
)); ?>
