<?php
/* @var $this HorarioController */
/* @var $data Horario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />		
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_cedula')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->usuario_cedula), array('usuario/'.$data->usuario_cedula)); ?>
	<br />	

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_inicio')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_inicio); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_fin')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_fin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hora_inicio')); ?>:</b>
	<?php 
	if($data->hora_inicio<12)
		echo CHtml::encode($data->hora_inicio.':00 AM');
	if($data->hora_inicio==12)
		echo CHtml::encode($data->hora_inicio.':00 PM');
	if($data->hora_inicio>12)
	{
		$hora=$data->hora_inicio-12;
		echo CHtml::encode('0'.$hora.':00 PM');
	}
	?>
	<br />	
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('hora_fin')); ?>:</b>
	<?php 
	if($data->hora_fin<12)
		echo CHtml::encode($data->hora_fin.':00 AM'); 
	if($data->hora_fin==12)
		echo CHtml::encode($data->hora_fin.':00 PM');
	if($data->hora_fin>12)
	{
		$hora=$data->hora_fin-12;
		echo CHtml::encode('0'.$hora.':00 PM');
	}
	?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('lunes')); ?>:</b>
	<?php 
	if($data->lunes==1)
	{
	?>
		<font color='#01DF3A'>
	<?php
		echo CHtml::encode("Asignado");
	?>
		</font>
	<?php
	}
	else
	{
	?>
		<font color='#FF4000'>
	<?php
		echo CHtml::encode("No Asignado");
	}
	?>
		</font>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('martes')); ?>:</b>
	<?php 
	if($data->martes==1)
	{
	?>
		<font color='#01DF3A'>
	<?php
		echo CHtml::encode("Asignado");
	?>
		</font>
	<?php
	}
	else
	{
	?>
		<font color='#FF4000'>
	<?php
		echo CHtml::encode("No Asignado");
	}
	?>
		</font>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('miercoles')); ?>:</b>
	<?php 
	if($data->miercoles==1)
	{
	?>
		<font color='#01DF3A'>
	<?php
		echo CHtml::encode("Asignado");
	?>
		</font>
	<?php
	}
	else
	{
	?>
		<font color='#FF4000'>
	<?php
		echo CHtml::encode("No Asignado");
	}
	?>
		</font>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jueves')); ?>:</b>
	<?php 
	if($data->jueves==1)
	{
	?>
		<font color='#01DF3A'>
	<?php
		echo CHtml::encode("Asignado");
	?>
		</font>
	<?php
	}
	else
	{
	?>
		<font color='#FF4000'>
	<?php
		echo CHtml::encode("No Asignado");
	}
	?>
		</font>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('viernes')); ?>:</b>
	<?php 
	if($data->viernes==1)
	{
	?>
		<font color='#01DF3A'>
	<?php
		echo CHtml::encode("Asignado");
	?>
		</font>
	<?php
	}
	else
	{
	?>
		<font color='#FF4000'>
	<?php
		echo CHtml::encode("No Asignado");
	}
	?>
		</font>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sabado')); ?>:</b>
	<?php 
	if($data->sabado==1)
	{
	?>
		<font color='#01DF3A'>
	<?php
		echo CHtml::encode("Asignado");
	?>
		</font>
	<?php
	}
	else
	{
	?>
		<font color='#FF4000'>
	<?php
		echo CHtml::encode("No Asignado");
	}
	?>
		</font>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('domingo')); ?>:</b>
	<?php 
	if($data->domingo==1)
	{
	?>
		<font color='#01DF3A'>
	<?php
		echo CHtml::encode("Asignado");
	?>
		</font>
	<?php
	}
	else
	{
	?>
		<font color='#FF4000'>
	<?php
		echo CHtml::encode("No Asignado");
	}
	?>
		</font>
	<br />	
	
<br>
</div>