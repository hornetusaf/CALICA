<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $cedula
 * @property string $pin
 * @property string $nombres
 * @property string $apellidos
 * @property string $email
 * @property string $telefono
 * @property string $usuario
 * @property string $clave
 * @property string $rfid
 * @property integer $tipo_usuario_id
 * @property integer $carrera_departamento_id
 *
 * The followings are the available model relations:
 * @property RegistroEntrada[] $registroEntradas
 * @property TipoUsuario $tipoUsuario
 * @property CarreraDepartamento $carreraDepartamento
 * @property UsuarioHasDia[] $usuarioHasDias
 */
class Usuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cedula, pin, nombres, apellidos, email, telefono, tipo_usuario_id, carrera_departamento_id', 'required'),
			array('cedula, tipo_usuario_id, carrera_departamento_id', 'numerical', 'integerOnly'=>true),
			array('pin', 'length', 'max'=>6),
			array('nombres, apellidos, email, usuario, clave', 'length', 'max'=>255),
			array('telefono', 'length', 'max'=>45),
			array('rfid', 'length', 'max'=>15),
			array('usuario','unique','message'=>'{attribute}:{value} ya existe!'),
			array('cedula','unique','message'=>'{attribute}:{value} ya existe!'),
			array('usuario', 'default', 'setOnEmpty' => true, 'value' => null),
			array('clave', 'default', 'setOnEmpty' => true, 'value' => null),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('cedula, pin, nombres, apellidos, email, telefono, usuario, clave, rfid, tipo_usuario_id, carrera_departamento_id', 'safe', 'on'=>'search'),
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
			'registroEntradas' => array(self::HAS_MANY, 'RegistroEntrada', 'usuario_cedula'),
			'tipoUsuario' => array(self::BELONGS_TO, 'TipoUsuario', 'tipo_usuario_id'),
			'carreraDepartamento' => array(self::BELONGS_TO, 'CarreraDepartamento', 'carrera_departamento_id'),
			'usuarioHasDias' => array(self::HAS_MANY, 'UsuarioHasDia', 'usuario_cedula'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cedula' => 'Cédula de identidad',
			'pin' => 'Pin de acceso',
			'nombres' => 'Nombres',
			'apellidos' => 'Apellidos',
			'email' => 'Correo electrónico',
			'telefono' => 'Número telefónico',
			'usuario' => 'Nombre de usuario si es administrador',
			'clave' => 'Contraseña si es administrador',
			'rfid' => '# Tarjeta RFID',
			'tipo_usuario_id' => 'Tipo de usuario',
			'carrera_departamento_id' => 'Carrera o Departamento',
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

		$criteria->compare('cedula',$this->cedula);
		$criteria->compare('pin',$this->pin,true);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('apellidos',$this->apellidos,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('clave',$this->clave,true);
		$criteria->compare('rfid',$this->rfid,true);
		$criteria->compare('tipo_usuario_id',$this->tipo_usuario_id);
		$criteria->compare('carrera_departamento_id',$this->carrera_departamento_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
