<?php

class UsuarioController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		$admin=TipoUsuario::model()->find('nombre=:nombre', array(':nombre'=>'Admin'));
		
		$usuarios = Usuario::model()->findAll();
		$arrayAdmin = array();
		foreach($usuarios as $t)
		{
			if($t->tipo_usuario_id==$admin->id)
				$arrayAdmin[$t->cedula] = $t->usuario;
		}
		
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index'),
				'users'=>$arrayAdmin,
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','view'),
				'users'=>$arrayAdmin,
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>$arrayAdmin,
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Usuario;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
			$model->clave=crypt($model->clave,'salt');
			
			$allowed_chars = 'ABCD1234567890';
			$allowed_count = strlen($allowed_chars);
			$password = null;
			$exist = null;
			$band = true;
			$password_length = 6;
			
			while($password === null || $band) 
			{
				$password = '';
				for($i = 0; $i < $password_length; ++$i) 
				{
					$password .= $allowed_chars{mt_rand(0, $allowed_count - 1)};
				}
				
				$exist=Usuario::model()->find('pin=:pin', array(':pin'=>$password));
		
				if($exist)
					$band=true;
				else
					$band=false;
			}
			
			$model->pin=$password;
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->cedula));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);		
		$modeloViejo=Usuario::model()->findByPK($model->cedula);
		
		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
			
			if($modeloViejo->clave!=$model->clave)
				$model->clave=crypt($model->clave,'salt');
				
			if($model->save())
				$this->redirect(array('view','id'=>$model->cedula));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
		
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser		
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Usuario');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{	
		$model=new Usuario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usuario']))
			$model->attributes=$_GET['Usuario'];
			
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Usuario the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Usuario::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Usuario $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
