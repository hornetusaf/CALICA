<?php
/* @var $this RegistroEntradaController */
/* @var $data RegistroEntrada */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_cedula')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->usuario_cedula), array('usuario/'.$data->usuario_cedula)); ?>
	<?php //echo CHtml::encode($data->usuario_cedula); ?>
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
