<?php
/* @var $this TipoUsuarioController */
/* @var $model TipoUsuario */

$this->breadcrumbs=array(
	'Tipos de Usuarios'=>array('index'),
	$model->nombre,
);
if($model->id == 1 || $model->id == 2 || $model->id == 3)
{	
        $arrayUpdate=array('label'=>'Actualizar Tipo de Usuario (Desactivado)');
	$arrayDelete=array('label'=>'Eliminar Tipo de Usuario (Desactivado)');
}
else
{
	$arrayUpdate=array('label'=>'Actualizar Tipo de Usuario', 'url'=>array('update', 'id'=>$model->id));
	$arrayDelete=array('label'=>'Eliminar Tipo de Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'));	
}

$this->menu=array(
	array('label'=>'Listar Tipos de Usuarios', 'url'=>array('index')),
	array('label'=>'Crear Tipo de Usuario', 'url'=>array('create')),
	$arrayUpdate,
	$arrayDelete,
	array('label'=>'Gestionar Tipos de Usuarios', 'url'=>array('admin')),
);
?>

<h1>Ver Tipo de Usuario # <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'descripcion',
	),
)); ?>
