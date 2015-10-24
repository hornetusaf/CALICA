<?php
/* @var $this HorarioController */
/* @var $model Horario */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php //echo $form->label($model,'id'); ?>
		<?php //echo $form->textField($model,'id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'usuario_cedula'); ?>
		<?php echo $form->textField($model,'usuario_cedula'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_inicio'); ?>
		<?php //echo $form->textField($model,'fecha_inicio',array('size'=>10,'maxlength'=>10)); 
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$model,
					'attribute'=>'fecha_inicio',
					'value'=>date("dd-mm-yy"),
					'language'=>'es',
					// additional javascript options for the date picker plugin
					'options'=>array(
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
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'fecha_fin'); ?>
		<?php //echo $form->textField($model,'fecha_fin',array('size'=>10,'maxlength'=>10)); 
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$model,
					'attribute'=>'fecha_fin',
					'value'=>date("dd-mm-yy"),
					'language'=>'es',
					// additional javascript options for the date picker plugin
					'options'=>array(
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
	</div>

	<div class="row">
		<?php //echo $form->label($model,'hora_inicio'); ?>
		<?php //echo $form->textField($model,'hora_inicio',array('size'=>2,'maxlength'=>2)); ?>
	</div>
	
	<div class="row">
		<?php //echo $form->label($model,'hora_fin'); ?>
		<?php //echo $form->textField($model,'hora_fin',array('size'=>2,'maxlength'=>2)); ?>
	</div>	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->