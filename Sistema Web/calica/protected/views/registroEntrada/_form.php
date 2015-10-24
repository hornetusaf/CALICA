<?php
/* @var $this RegistroEntradaController */
/* @var $model RegistroEntrada */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'registro-entrada-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hora'); ?>
		<?php echo $form->textField($model,'hora',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'hora'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'foto'); ?>
		<?php echo $form->textField($model,'foto',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'foto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usuario_cedula'); ?>
		<?php echo $form->textField($model,'usuario_cedula'); ?>
		<?php echo $form->error($model,'usuario_cedula'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->