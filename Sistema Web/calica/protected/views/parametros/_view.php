<?php
/* @var $this ParametrosController */
/* @var $data Parametros */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />
	
	<?php 
	if($data->texto)
	{
	?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('texto')); ?>:</b>
	<?php echo CHtml::encode($data->texto); ?>
	<br />
	<?php
	}
	?>
	
	<?php 
	if($data->texto_largo)
	{
	?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('texto_largo')); ?>:</b>
	<?php echo CHtml::encode($data->texto_largo); ?>
	<br />
	<?php
	}
	?>
	
	<?php 
	if($data->bool)
	{
	?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('bool')); ?>:</b>
	<?php echo CHtml::encode($data->bool); ?>
	<br />
	<?php
	}
	?>
	
	<?php 
	if($data->fecha!="0000-00-00")
	{
	?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />
	<?php
	}
	?>
	
	<?php 
	if($data->hora!="00:00:00")
	{
	?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('hora')); ?>:</b>
	<?php echo CHtml::encode($data->hora); ?>
	<br />
	<?php
	}
	?>
	
	<?php 
	if($data->entero)
	{
	?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('entero')); ?>:</b>
	<?php echo CHtml::encode($data->entero); ?>
	<br />
	<?php
	}
	?>
	
	<?php 
	if($data->decimal)
	{
	?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('decimal')); ?>:</b>
	<?php echo CHtml::encode($data->decimal); ?>
	<br />
	<?php
	}
	?>
	
<br>
</div>