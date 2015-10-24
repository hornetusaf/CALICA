<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cedula'); ?>
		<?php echo $form->textField($model,'cedula'); ?>
		<?php echo $form->error($model,'cedula'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'pin'); ?>
		<?php echo $form->hiddenField($model,'pin',array('size'=>6,'maxlength'=>6)); ?>
		<?php //echo $form->error($model,'pin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombres'); ?>
		<?php echo $form->textField($model,'nombres',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nombres'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apellidos'); ?>
		<?php echo $form->textField($model,'apellidos',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'apellidos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'telefono'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usuario'); ?>
		<?php echo $form->textField($model,'usuario',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'clave'); ?>
		<?php echo $form->passwordField($model,'clave',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'clave'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'rfid'); ?>
		<?php echo $form->hiddenField($model,'rfid',array('size'=>15,'maxlength'=>15)); ?>
		<?php //echo $form->error($model,'rfid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_usuario_id'); ?>
		<?php echo $form->dropDownList($model,'tipo_usuario_id',CHtml::listData(TipoUsuario::model()->findAll(),'id','nombre')); ?>
		<?php echo $form->error($model,'tipo_usuario_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'carrera_departamento_id'); ?>
		<?php echo $form->dropDownList($model,'carrera_departamento_id',CHtml::listData(CarreraDepartamento::model()->findAll(),'id','nombre')); ?>
		<?php echo $form->error($model,'carrera_departamento_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
