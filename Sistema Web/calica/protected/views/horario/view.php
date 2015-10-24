<?php
/* @var $this HorarioController */
/* @var $model Horario */

$this->breadcrumbs=array(
	'Horarios'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Horarios', 'url'=>array('index')),
	array('label'=>'Crear Horario', 'url'=>array('create')),
	array('label'=>'Actualizar Horario', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Horario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Horarios', 'url'=>array('admin')),
);
?>

<h1>Ver Horario # <?php echo $model->id; ?></h1>

<?php
if($model->hora_inicio<12)
		$inicio=$model->hora_inicio.':00 AM'; 
	if($model->hora_inicio==12)
		$inicio=$model->hora_inicio.':00 PM';
	if($model->hora_inicio>12)
	{
		$hora=$model->hora_inicio-12;
		$inicio='0'.$hora.':00 PM';
	}
 
if($model->hora_fin<12)
		$fin=$model->hora_fin.':00 AM'; 
	if($model->hora_fin==12)
		$fin=$model->hora_fin.':00 PM';
	if($model->hora_fin>12)
	{
		$hora=$model->hora_fin-12;
		$fin='0'.$hora.':00 PM';
	}

if($model->lunes==1)
	$valorLunes="<font color='#01DF3A'>Asignado</font>";
else
	$valorLunes="<font color='#FF4000'>No Asignado</font>";
	
if($model->martes==1)
	$valorMartes="<font color='#01DF3A'>Asignado</font>";
else
	$valorMartes="<font color='#FF4000'>No Asignado</font>";
	
if($model->miercoles==1)
	$valorMiercoles="<font color='#01DF3A'>Asignado</font>";
else
	$valorMiercoles="<font color='#FF4000'>No Asignado</font>";
	
if($model->jueves==1)
	$valorJueves="<font color='#01DF3A'>Asignado</font>";
else
	$valorJueves="<font color='#FF4000'>No Asignado</font>";

if($model->viernes==1)
	$valorViernes="<font color='#01DF3A'>Asignado</font>";
else
	$valorViernes="<font color='#FF4000'>No Asignado</font>";
	
if($model->sabado==1)
	$valorSabado="<font color='#01DF3A'>Asignado</font>";
else
	$valorSabado="<font color='#FF4000'>No Asignado</font>";
	
if($model->domingo==1)
	$valorDomingo="<font color='#01DF3A'>Asignado</font>";
else
	$valorDomingo="<font color='#FF4000'>No Asignado</font>";
	
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
        'name'=>'usuario_cedula',
        'type'=>'raw',
        'value'=>CHtml::link($model->usuario_cedula, '/calica/usuario/'.$model->usuario_cedula),
			),
		array(
        'name'=>'Nombres',
        'type'=>'raw',
        'value'=>$model->usuarioCedula->nombres,
			),
		array(
        'name'=>'Apellidos',
        'type'=>'raw',
        'value'=>$model->usuarioCedula->apellidos,
			),
		'fecha_inicio',
		'fecha_fin',
		array(
        'name'=>'hora_inicio',
        'type'=>'raw',
        'value'=>$inicio,
			),
		array(
        'name'=>'hora_fin',
        'type'=>'raw',
        'value'=>$fin,
			),		
		array(
	'label'=>'lunes',
	'type'=>'html',
	'value'=>$valorLunes,
			),
		array(
	'label'=>'martes',
	'type'=>'html',
	'value'=>$valorMartes,
			),
		array(
	'label'=>'miercoles',
	'type'=>'html',
	'value'=>$valorMiercoles,
			),
		array(
	'label'=>'jueves',
	'type'=>'html',
	'value'=>$valorJueves,
			),
		array(
	'label'=>'viernes',
	'type'=>'html',
	'value'=>$valorViernes,
			),
		array(
	'label'=>'sabado',
	'type'=>'html',
	'value'=>$valorSabado,
			),
		array(
	'label'=>'domingo',
	'type'=>'html',
	'value'=>$valorDomingo,
			),
	),
)); ?>
