<?php
/* @var $this RegistroSalidaController */
/* @var $model RegistroSalida */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha'); ?>
		<?php //echo $form->textField($model,'fecha',array('size'=>10,'maxlength'=>10)); 
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
					'model'=>$model,
					'attribute'=>'fecha',
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
		<?php echo $form->label($model,'hora'); ?>
		<?php echo $form->textField($model,'hora',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'foto'); ?>
		<?php //echo $form->textField($model,'foto',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->