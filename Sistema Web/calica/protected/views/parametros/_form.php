<?php
/* @var $this ParametrosController */
/* @var $model Parametros */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'parametros-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'texto'); ?>
		<?php echo $form->textArea($model,'texto',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'texto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'texto_largo'); ?>
		<?php echo $form->textArea($model,'texto_largo',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'texto_largo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bool'); ?>
		<?php echo $form->textField($model,'bool'); ?>
		<?php echo $form->error($model,'bool'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php //echo $form->textField($model,'fecha'); 
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$model,
					'attribute'=>'fecha',
					'value'=>date("dd-mm-yy"),
					'language'=>'es',
					// additional javascript options for the date picker plugin
					'options'=>array(
					'minDate'=>0,
					'dateFormat'=>'yy-mm-dd',
					'duration'=>'fast',
					'constrainInput'=>'true',
					'showAnim'=>'fold',
					),
					'htmlOptions'=>array(
					'style'=>'height:20px;'
					),
					));
		?>		
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hora'); ?>
		<?php echo $form->textField($model,'hora'); ?>
		<?php echo $form->error($model,'hora'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entero'); ?>
		<?php echo $form->textField($model,'entero'); ?>
		<?php echo $form->error($model,'entero'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'decimal'); ?>
		<?php echo $form->textField($model,'decimal',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'decimal'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->