<?php
/* @var $this ParametrosController */
/* @var $model Parametros */
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
		<?php echo $form->label($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'texto'); ?>
		<?php echo $form->textArea($model,'texto',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'texto_largo'); ?>
		<?php echo $form->textArea($model,'texto_largo',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bool'); ?>
		<?php echo $form->textField($model,'bool'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hora'); ?>
		<?php echo $form->textField($model,'hora'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entero'); ?>
		<?php echo $form->textField($model,'entero'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'decimal'); ?>
		<?php echo $form->textField($model,'decimal',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->