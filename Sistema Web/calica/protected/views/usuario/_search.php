<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'cedula'); ?>
		<?php echo $form->textField($model,'cedula'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'pin'); ?>
		<?php //echo $form->textField($model,'pin',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombres'); ?>
		<?php echo $form->textField($model,'nombres',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apellidos'); ?>
		<?php echo $form->textField($model,'apellidos',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'usuario'); ?>
		<?php //echo $form->textField($model,'usuario',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'clave'); ?>
		<?php //echo $form->textField($model,'clave',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'rfid'); ?>
		<?php //echo $form->textField($model,'rfid',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_usuario_id'); ?>
		<?php echo $form->textField($model,'tipo_usuario_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'carrera_departamento_id'); ?>
		<?php echo $form->textField($model,'carrera_departamento_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->