<?php
/* @var $this RegistroSalidaController */
/* @var $model RegistroSalida */

$this->breadcrumbs=array(
	'Salidas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Salidas', 'url'=>array('index')),
	//array('label'=>'Crear Salida', 'url'=>array('create')),
	//array('label'=>'Actualizar Salida', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Eliminar Salida', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Salidas', 'url'=>array('admin')),
);
?>

<h1>Ver Salida # <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fecha',
		'hora',
		 array(        
                 'name'=>'foto',
                 'value'=> CHtml::image(Yii::app()->request->baseUrl.$model->foto),
                 'type'=>'raw',
              ),
	),
)); ?>
