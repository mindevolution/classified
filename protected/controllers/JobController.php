<?php

class JobController extends JController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/job';

	const OTHERADMIN_UID = 2;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'create', 'auth', 'authEdit', 'update'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		// set the job list main menu status to active when in the job detail page
		Yii::app()->params['show_job_main_menu'] = true;

		// if next job id exists then load the next job or set the netxt job to false
		$nextJob = ($nextId = Job::model()->getNextId($id))?$this->loadModel($nextId):false;
		// if previous job id exists then load the previous job or set the previous job to false
		$prevJob = ($prevId = Job::model()->getPrevId($id))?$this->loadModel($prevId):false;

		$messages = '';
		foreach(Yii::app()->user->getFlashes() as $key => $message) {
			if($key != 'lastjob_day') {
				$messages .= '<div class="flash-' . $key . '">' . $message . "</div>\n";
			}
		}
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'nextJob'=>$nextJob,
			'prevJob'=>$prevJob,
		    	'messages'=>$messages,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		// set the job list main menu status to active when in the job detail page
		Yii::app()->params['show_job_main_menu'] = true;
		$model=new Job;
		$model->pid = isset($_GET['pid'])?$_GET['pid']:(isset($_POST['pid'])?$_POST['pid']:'');
		$model->uid = self::OTHERADMIN_UID;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Job']) && !Yii::app()->request->isAjaxRequest)
		{
			$_POST['Job']['timestamp'] = date( 'Y-m-d H:i:s');
			$_POST['Job']['password'] = md5($_POST['Job']['password']);
			$model->attributes=$_POST['Job'];
			if($model->save()) {
				Yii::app()->user->setFlash('Success', "創建成功!");
				$this->redirect(array('view','id'=>$model->id));
			}
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
		if( Job::model()->jobOnwerAuth($id) !== TRUE) {
			if(!Yii::app()->user->hasFlash('Warning')) {
				Yii::app()->user->setFlash('Warning', "請正確輸入管理密碼！");
			}
			$this->redirect(array('view','id'=>$id));
		}
		// set the job list main menu status to active when in the job detail page
		Yii::app()->params['show_job_main_menu'] = true;
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Job']))
		{
			$model->attributes=$_POST['Job'];
			if($model->save()) {
				Yii::app()->user->setFlash('success', "修改成功！");
				$this->redirect(array('view','id'=>$model->id));
			}
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
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionAuth($id) {
		$mesg = '';
		// Not direct delete, only use ajax
		if (Yii::app()->request->isAjaxRequest && isset($_POST['password'])) {
			if(Job::model()->jobOnwerAuth($id, $_POST['password'])) {
				// delete the record
				$this->loadModel($id)->delete();
				echo CJSON::encode(array(
					'status' => 'Success',
					'div' => "删除成功"
				));
				exit;
			} else {
				$mesg = "密碼錯誤<br/>";
			}
		}

		// return the password form
		echo CJSON::encode(array(
			'status' => 'failure',
			'div' => $mesg.$this->renderPartial('authForm', null, TRUE)
		));
		exit;
	}

	public function actionAuthEdit($id) {
		$mesg = '';
		// Not direct delete, only use ajax
		if (Yii::app()->request->isAjaxRequest && isset($_POST['password'])) {
			if(Job::model()->jobOnwerAuth($id, $_POST['password'])) {
				// delete the record
				echo CJSON::encode(array(
					'status' => 'Success',
					'div' => ""
				));
				exit;
			} else {
				$mesg .= "密碼錯誤<br/>";
			}
		}

		// return the password form
		echo CJSON::encode(array(
			'status' => 'failure',
			'div' => $mesg.$this->renderPartial('authForm', null, TRUE)
		));
		exit;
	}

	/**
	 * Lists all models.
	 * @param int $aid the area id to filter the job list
	 */
	public function actionIndex($aid = null)
	{
		$page_size = 10;
		$criteria = new CDbCriteria;
		if ($aid) {
			$criteria->condition = 'aid=' . $aid;
		}
		$dataProvider = new CActiveDataProvider('Job',
				array(
					'criteria' => array(
						'condition' => $criteria->condition,
						'order' => 'id DESC',
					),
					'pagination' => array(
						'pageSize' => $page_size,
					),
			));
		$this->render('index', array(
			'dataProvider' => $dataProvider,
			'areas' => Area::getAreasByPid(0),
			'pageSize' => $page_size,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Job('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Job']))
			$model->attributes=$_GET['Job'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Job::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='job-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
