<?php
/* @var $this RegistroSalidaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Salidas',
);

$this->menu=array(
	//('label'=>'Crear Salida', 'url'=>array('create')),
	array('label'=>'Gestionar Salidas', 'url'=>array('admin')),
);
?>

<h1>Registro de Salidas</h1>

<?php 
	$dataProvider->sort->defaultOrder='id DESC';
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
