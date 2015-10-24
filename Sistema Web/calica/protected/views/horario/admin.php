<?php
/* @var $this HorarioController */
/* @var $model Horario */

$this->breadcrumbs=array(
	'Horarios'=>array('index'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Listar Horarios', 'url'=>array('index')),
	array('label'=>'Crear Horario', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#horario-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Horarios</h1>

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
$model->dbCriteria->order='id DESC';
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'horario-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
				'header'=>'Nombre',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'$data->usuarioCedula->nombres'
			 ),
		array(
				'name'=>'usuario_cedula',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'$data->usuario_cedula'
			 ),		
		array(
				'name'=>'fecha_inicio',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'$data->fecha_inicio'
			 ),
		array(
				'name'=>'fecha_fin',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'$data->fecha_fin'
			 ),
		array(
				'name'=>'lunes',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'($data->lunes == 1) ? "Si" : "No "'
			),
		array(
				'name'=>'martes',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'($data->martes == 1) ? "Si" : "No "'
			),	
		array(
				'name'=>'miercoles',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'($data->miercoles == 1) ? "Si" : "No "'
			),	
		array(
				'name'=>'jueves',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'($data->jueves == 1) ? "Si" : "No "'
			),	
		array(
				'name'=>'viernes',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'($data->viernes == 1) ? "Si" : "No "'
			),	
		array(
				'name'=>'sabado',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'($data->sabado == 1) ? "Si" : "No "'
			),	
		array(
				'name'=>'domingo',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'($data->domingo == 1) ? "Si" : "No "'
			),	
		array(
			'class'=>'CButtonColumn',
			),			
	),
)); ?>
