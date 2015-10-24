<?php

/**
 * This is the model class for table "parametros".
 *
 * The followings are the available columns in table 'parametros':
 * @property integer $id
 * @property string $nombre
 * @property string $texto
 * @property string $texto_largo
 * @property integer $bool
 * @property string $fecha
 * @property string $hora
 * @property integer $entero
 * @property string $decimal
 */
class Parametros extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'parametros';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre', 'required'),
			array('bool, entero', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>255),
			array('decimal', 'length', 'max'=>10),
			array('texto, texto_largo, fecha, hora', 'safe'),
			array('nombre','unique','message'=>'{attribute}:{value} ya existe!'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, texto, texto_largo, bool, fecha, hora, entero, decimal', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Identificador',
			'nombre' => 'Nombre del parámetro',
			'texto' => 'Valor de texto',
			'texto_largo' => 'Valor de texto largo',
			'bool' => 'Valor booleano',
			'fecha' => 'Valor de fecha',
			'hora' => 'Valor de hora',
			'entero' => 'Valor numerico entero',
			'decimal' => 'Valor numerico decimal',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('texto',$this->texto,true);
		$criteria->compare('texto_largo',$this->texto_largo,true);
		$criteria->compare('bool',$this->bool);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('hora',$this->hora,true);
		$criteria->compare('entero',$this->entero);
		$criteria->compare('decimal',$this->decimal,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Parametros the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
