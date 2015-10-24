<?php
/* @var $this RegistroSalidaController */
/* @var $data RegistroSalida */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hora')); ?>:</b>
	<?php echo CHtml::encode($data->hora); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('foto')); ?>:</b><br>
	<?php echo CHtml::image(Yii::app()->request->baseUrl.$data->foto,'alt',array('width'=>320,'height'=>240)); ?>
	<?php //echo CHtml::encode($data->foto); ?>
	<br />

<br>
</div>
