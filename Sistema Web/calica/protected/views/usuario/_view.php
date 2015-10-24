<?php
/* @var $this UsuarioController */
/* @var $data Usuario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cedula')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cedula), array('view', 'id'=>$data->cedula)); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pin')); ?>:</b>
	<?php echo CHtml::encode($data->pin); ?>
	<br />
	*/ 
	?>
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('nombres')); ?>:</b>
	<?php echo CHtml::encode($data->nombres); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellidos')); ?>:</b>
	<?php echo CHtml::encode($data->apellidos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />	
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario')).":"; ?></b>
	<?php echo CHtml::encode($data->usuario); ?>
	<br />
	*/ 
	?>

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('clave')); ?>:</b>
	<?php echo CHtml::encode($data->clave); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rfid')); ?>:</b>
	<?php echo CHtml::encode($data->rfid); ?>
	<br />
	*/ 
	?>
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_usuario_id')); ?>:</b>
	<?php 
	$valor = TipoUsuario::model()->findByPk($data->tipo_usuario_id);
	echo CHtml::link(CHtml::encode($valor->nombre), array('/tipoUsuario/'.$valor->id));
	?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('carrera_departamento_id')); ?>:</b>
	<?php 
	$valor = CarreraDepartamento::model()->findByPk($data->carrera_departamento_id);
	echo CHtml::link(CHtml::encode($valor->nombre), array('/carreraDepartamento/'.$valor->id));
	?>
	<br />
	
<br>
</div>