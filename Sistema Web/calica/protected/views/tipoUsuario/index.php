<?php
/* @var $this TipoUsuarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipos de Usuarios',
);

$this->menu=array(
	array('label'=>'Crear Tipo de Usuario', 'url'=>array('create')),
	array('label'=>'Gestionar Tipos de Usuarios', 'url'=>array('admin')),
);
?>

<h1>Tipos de Usuarios</h1>

<?php 
$dataProvider->sort->defaultOrder='id DESC';
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
