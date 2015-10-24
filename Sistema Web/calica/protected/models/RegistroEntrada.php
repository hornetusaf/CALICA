<?php

/**
 * This is the model class for table "registro_entrada".
 *
 * The followings are the available columns in table 'registro_entrada':
 * @property integer $id
 * @property string $fecha
 * @property string $hora
 * @property string $foto
 * @property integer $usuario_cedula
 *
 * The followings are the available model relations:
 * @property Usuario $usuarioCedula
 */
class RegistroEntrada extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'registro_entrada';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha, hora, usuario_cedula', 'required'),
			array('usuario_cedula', 'numerical', 'integerOnly'=>true),
			array('fecha', 'length', 'max'=>10),
			array('hora', 'length', 'max'=>8),
			array('foto', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fecha, hora, foto, usuario_cedula', 'safe', 'on'=>'search'),
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
			'fecha' => 'Fecha de entrada',
			'hora' => 'Hora de entrada',
			'foto' => 'Foto',
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
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('hora',$this->hora,true);
		$criteria->compare('foto',$this->foto,true);
		$criteria->compare('usuario_cedula',$this->usuario_cedula);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RegistroEntrada the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
