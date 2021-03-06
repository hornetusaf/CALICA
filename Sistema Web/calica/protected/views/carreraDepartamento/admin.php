<?php
/* @var $this CarreraDepartamentoController */
/* @var $model CarreraDepartamento */

$this->breadcrumbs=array(
	'Carreras / Departamentos'=>array('index'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Listar Carreras / Departamentos', 'url'=>array('index')),
	array('label'=>'Crear Carrera / Departamento', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#carrera-departamento-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Carreras / Departamentos</h1>

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
$model->dbCriteria->order='id ASC';
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'carrera-departamento-grid',
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
				'name'=>'descripcion',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'$data->descripcion'
			 ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
