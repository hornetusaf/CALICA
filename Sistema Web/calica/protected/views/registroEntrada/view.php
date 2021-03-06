<?php
/* @var $this RegistroEntradaController */
/* @var $model RegistroEntrada */

$this->breadcrumbs=array(
	'Entradas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Entradas', 'url'=>array('index')),
	//array('label'=>'Crear Entrada', 'url'=>array('create')),
	//array('label'=>'Actualizar Entrada', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Eliminar Entrada', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Entradas', 'url'=>array('admin')),
);
?>

<h1>Ver Entrada # <?php echo $model->id; ?></h1>

<?php 
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fecha',
		'hora',
		array(
        'name'=>'usuario_cedula',
        'type'=>'raw',
        'value'=>CHtml::link($model->usuario_cedula, '/calica/usuario/'.$model->usuario_cedula),
			),
		array(        
                 'name'=>'foto',
                 'value'=> CHtml::image(Yii::app()->request->baseUrl.$model->foto),
                 'type'=>'raw',
              ),
	),
)); ?>
