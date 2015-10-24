<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Listar Usuarios', 'url'=>array('index')),
	array('label'=>'Crear Usuario', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#usuario-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Usuarios</h1>

<p>
Puede opcionalmente ingresar un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) al inicio de cada valor de búsqueda para especificar cómo se debe hacer la comparación.
</p>

<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
$model->dbCriteria->order='cedula ASC';
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuario-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'ajaxUpdate'=>false,
	'columns'=>array(
		array(
				'name'=>'cedula',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'$data->cedula'
			 ),
		array(
				'name'=>'pin',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'$data->pin'
			 ),
		array(
				'name'=>'nombres',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'$data->nombres'
			 ),
		array(
				'name'=>'apellidos',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'$data->apellidos'
			 ),
		array(
				'name'=>'email',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'$data->email'
			 ),
		array(
				'name'=>'telefono',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'$data->telefono'
			 ),
		/*
		'usuario',
		'clave',
		'rfid',
		*/
		array(
              'name' => 'tipo_usuario_id',			  
		      'htmlOptions'=>array('style'=>'text-align:center'),
              'value' => '$data->tipoUsuario->nombre',
              ),
		array(
              'name' => 'carrera_departamento_id',			  
			  'htmlOptions'=>array('style'=>'text-align:center'),
              'value' => '$data->carreraDepartamento->nombre',
              ),	
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
