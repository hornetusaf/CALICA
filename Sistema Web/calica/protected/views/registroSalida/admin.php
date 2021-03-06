<?php
/* @var $this RegistroSalidaController */
/* @var $model RegistroSalida */

$this->breadcrumbs=array(
	'Salidas'=>array('index'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Listar Salidas', 'url'=>array('index')),
	//array('label'=>'Crear Salida', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#registro-salida-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Registro de Salidas</h1>

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
Yii::import('application.components.EImageColumn');
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'registro-salida-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
				'name'=>'id',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'$data->id'
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
            'class'=>'EImageColumn',
            'name' => 'foto',
            'htmlOptions' => array('style' => 'width: 160px;'),
            ),
		array(
			'class'=>'CButtonColumn',
			'template' => '{view}',
		),
	),
)); ?>
