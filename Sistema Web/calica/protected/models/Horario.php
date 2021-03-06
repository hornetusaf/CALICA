<?php

/**
 * This is the model class for table "horario".
 *
 * The followings are the available columns in table 'horario':
 * @property integer $id
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $hora_inicio
 * @property string $hora_fin
 * @property integer $lunes
 * @property integer $martes
 * @property integer $miercoles
 * @property integer $jueves
 * @property integer $viernes
 * @property integer $sabado
 * @property integer $domingo
 * @property integer $usuario_cedula
 *
 * The followings are the available model relations:
 * @property Usuario $usuarioCedula
 */
class Horario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'horario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		$match=Usuario::model()->findByPk('usuario_cedula');
		if($match)
			$cedula='/'.$match->cedula.'/';
		else
			$cedula='/ /';
			
		return array(
			array('usuario_cedula', 'required'),
			array('lunes, martes, miercoles, jueves, viernes, sabado, domingo, usuario_cedula', 'numerical', 'integerOnly'=>true),
			array('fecha_inicio, fecha_fin', 'length', 'max'=>10),
			array('hora_inicio, hora_fin', 'length', 'max'=>2),
			array('usuario_cedula', 'exist', 'allowEmpty' => false, 'attributeName'=>'cedula', 'className'=>'Usuario', 'message'=>'Debe ingresar la cedula de un usuario registrado.'),
			array('hora_fin','compare','compareAttribute'=>'hora_inicio','operator'=>'>=','message'=>'Hora de culminación debe ser mayor o igual a la de inicio'),
			array('fecha_fin','compare','compareAttribute'=>'fecha_inicio','operator'=>'>=','message'=>'Fecha de culminación debe ser mayor o igual a la de inicio'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fecha_inicio, fecha_fin, hora_inicio, hora_fin, lunes, martes, miercoles, jueves, viernes, sabado, domingo, usuario_cedula', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'usuarioCedula' => array(self::BELONGS_TO, 'Usuario', 'usuario_cedula'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Identificador',
			'fecha_inicio' => 'Fecha de inicio',
			'fecha_fin' => 'Fecha de culminación',
			'hora_inicio' => 'Hora de inicio',
			'hora_fin' => 'Hora de culminación',
			'lunes' => 'Lunes',
			'martes' => 'Martes',
			'miercoles' => 'Miércoles',
			'jueves' => 'Jueves',
			'viernes' => 'Viernes',
			'sabado' => 'Sábado',
			'domingo' => 'Domingo',
			'usuario_cedula' => 'Cédula del usuario',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);
		$criteria->compare('hora_inicio',$this->hora_inicio,true);
		$criteria->compare('hora_fin',$this->hora_fin,true);
		$criteria->compare('lunes',$this->lunes);
		$criteria->compare('martes',$this->martes);
		$criteria->compare('miercoles',$this->miercoles);
		$criteria->compare('jueves',$this->jueves);
		$criteria->compare('viernes',$this->viernes);
		$criteria->compare('sabado',$this->sabado);
		$criteria->compare('domingo',$this->domingo);
		$criteria->compare('usuario_cedula',$this->usuario_cedula);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Horario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
