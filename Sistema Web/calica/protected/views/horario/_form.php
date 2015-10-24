<?php
/* @var $this HorarioController */
/* @var $model Horario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'horario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
	<?php echo $form->labelEx($model,'usuario_cedula'); ?>
		<?php 
			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'attribute'=>'usuario_cedula',
				'model'=>$model,
				'sourceUrl'=>array('horario/aclist'),
				'name'=>'usuario_cedula',
				'options'=>array(
				'minLength'=>'2',
							),
				'htmlOptions'=>array(
				'size'=>10,
				'maxlength'=>10,
				),
		)); ?>	
		
		<?php //echo $form->textField($model,'usuario_cedula'); ?>
		<?php echo $form->error($model,'usuario_cedula'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_inicio'); ?>
		<?php //echo $form->textField($model,'fecha_inicio',array('size'=>10,'maxlength'=>10)); 
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$model,
					'attribute'=>'fecha_inicio',
					'value'=>date("dd-mm-yy"),
					'language'=>'es',
					// additional javascript options for the date picker plugin
					'options'=>array(
					'minDate'=>0,
					'dateFormat'=>'dd-mm-yy',
					'duration'=>'fast',
					'constrainInput'=>'true',
					'showAnim'=>'fold',
					),
					'htmlOptions'=>array(
					'style'=>'height:20px;'
					),
					));
		?>
		<?php echo $form->error($model,'fecha_inicio'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'fecha_fin'); ?>
		<?php //echo $form->textField($model,'fecha_fin',array('size'=>10,'maxlength'=>10)); 
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$model,
					'attribute'=>'fecha_fin',
					'value'=>date("dd-mm-yy"),
					'language'=>'es',
					// additional javascript options for the date picker plugin
					'options'=>array(
					'minDate'=>0,
					'dateFormat'=>'dd-mm-yy',
					'duration'=>'fast',
					'constrainInput'=>'true',
					'showAnim'=>'fold',
					),
					'htmlOptions'=>array(
					'style'=>'height:20px;'
					),
					));
		?>
		<?php echo $form->error($model,'fecha_fin'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'hora_inicio'); ?>
		<?php echo $form->dropDownList($model, 'hora_inicio', 
              array('06'=>'06:00 AM','07'=>'07:00 AM','08'=>'08:00 AM','09'=>'09:00 AM','10'=>'10:00 AM','11'=>'11:00 AM','12'=>'12:00 PM','13'=>'01:00 PM','14'=>'02:00 PM','15'=>'03:00 PM','16'=>'04:00 PM','17'=>'05:00 PM','18'=>'06:00 PM','19'=>'07:00 PM','20'=>'08:00 PM','21'=>'09:00 PM'));?>
		<?php //echo $form->textField($model,'hora_inicio',array('size'=>2,'maxlength'=>2));?>
		<?php echo $form->error($model,'hora_inicio'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'hora_fin'); ?>
		<?php echo $form->dropDownList($model, 'hora_fin', 
              array('06'=>'06:00 AM','07'=>'07:00 AM','08'=>'08:00 AM','09'=>'09:00 AM','10'=>'10:00 AM','11'=>'11:00 AM','12'=>'12:00 PM','13'=>'01:00 PM','14'=>'02:00 PM','15'=>'03:00 PM','16'=>'04:00 PM','17'=>'05:00 PM','18'=>'06:00 PM','19'=>'07:00 PM','20'=>'08:00 PM','21'=>'09:00 PM'));?>
		<?php //echo $form->textField($model,'hora_fin',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'hora_fin'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'lunes'); ?>
		<?php echo $form->checkBox($model,'lunes'); ?>
		<?php echo $form->error($model,'lunes'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'martes'); ?>
		<?php echo $form->checkBox($model,'martes'); ?>
		<?php echo $form->error($model,'martes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'miercoles'); ?>
		<?php echo $form->checkBox($model,'miercoles'); ?>
		<?php echo $form->error($model,'miercoles'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jueves'); ?>
		<?php echo $form->checkBox($model,'jueves'); ?>
		<?php echo $form->error($model,'jueves'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'viernes'); ?>
		<?php echo $form->checkBox($model,'viernes'); ?>
		<?php echo $form->error($model,'viernes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sabado'); ?>
		<?php echo $form->checkBox($model,'sabado'); ?>
		<?php echo $form->error($model,'sabado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'domingo'); ?>
		<?php echo $form->checkBox($model,'domingo'); ?>
		<?php echo $form->error($model,'domingo'); ?>
	</div>	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->