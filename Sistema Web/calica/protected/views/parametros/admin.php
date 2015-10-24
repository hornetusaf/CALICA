<?php
/* @var $this ParametrosController */
/* @var $model Parametros */

$this->breadcrumbs=array(
	'Parámetros'=>array('index'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Listar Parámetros', 'url'=>array('index')),
	array('label'=>'Crear Parámetro', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#parametros-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Parámetros</h1>

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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'parametros-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
				'name'=>'id',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'$data->id'
			 ),
		array(
				'name'=>'nombre',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'$data->nombre'
			 ),
		array(
				'name'=>'texto',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'$data->texto'
			 ),
		array(
				'name'=>'texto_largo',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'$data->texto_largo'
			 ),
		array(
				'name'=>'bool',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'$data->bool'
			 ),
		array(
				'name'=>'fecha',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'$data->fecha'
			 ),
		array(
				'name'=>'hora',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'$data->hora'
			 ),
		array(
				'name'=>'entero',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'$data->entero'
			 ),
		array(
				'name'=>'decimal',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'$data->decimal'
			 ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
