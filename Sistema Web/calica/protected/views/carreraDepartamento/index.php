<?php
/* @var $this CarreraDepartamentoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Carreras / Departamentos',
);

$this->menu=array(
	array('label'=>'Crear Carrera / Departamento', 'url'=>array('create')),
	array('label'=>'Gestionar Carrera / Departamento', 'url'=>array('admin')),
);
?>

<h1>Carreras / Departamentos</h1>

<?php 
$dataProvider->sort->defaultOrder='id DESC';
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
