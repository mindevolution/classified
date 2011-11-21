<?php

/**
 * This is the model class for table "classified_job".
 *
 * The followings are the available columns in table 'classified_job':
 * @property integer $id
 * @property string $description
 * @property string $title
 * @property integer $uid
 * @property integer $aid
 * @property integer $tid
 * @property integer $cid
 * @property string $timestamp
 * @property integer $pid
 * @property string $password
 * @property string $telephone
 * @property string $email
 */
class Job extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Job the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'classified_job';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, aid, tid, cid, pid, description', 'required'),
			array('uid, aid, tid, cid, pid', 'numerical', 'integerOnly'=>true),
			array('description, telephone, email', 'length', 'max'=>45),
			array('title', 'length', 'max'=>255),
		    	array('password', 'length', 'max'=>32),
			array('timestamp', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, description, title, uid, aid, tid, cid, timestamp, pid, password, telephone, email', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'uid'),
			'area' => array(self::BELONGS_TO, 'Area', 'aid'),
			'category' => array(self::BELONGS_TO, 'Category', 'cid'),
			'type' => array(self::BELONGS_TO, 'JobType', 'tid'),
			'purpose' => array(self::BELONGS_TO, 'JobPurpose', 'pid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'description' => 'Description',
			'title' => 'Title',
			'uid' => 'Uid',
			'aid' => '所在地區',
			'tid' => 'Tid',
			'cid' => '工作類型',
			'timestamp' => 'Timestamp',
			'pid' => 'Pid',
		    	'password' => '管理密碼',
			'telephone' => '電話',
			'email' => 'Email',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('uid',$this->uid);
		$criteria->compare('aid',$this->aid);
		$criteria->compare('tid',$this->tid);
		$criteria->compare('cid',$this->cid);
		$criteria->compare('timestamp',$this->timestamp,true);
		$criteria->compare('pid',$this->pid);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * get the next job id
	 * @param type $id 
	 */
	function getNextId($id) {
		$options = array(
			'order' => 'id ASC',
			'condition' => 'id>:id',
			'limit'=>1,
			'params' => array(':id' => $id),
		);
		$data = $this->findAll($options);
		return  count($data) ? $data[0]->id : false;
	}

	/**
	 * get the next job id
	 * @param type $id 
	 */
	function getPrevId($id) {
		$options = array(
			'order' => 'id DESC',
			'condition' => 'id<:id',
			'limit'=>1,
			'params' => array(':id' => $id),
		);
		$data = $this->findAll($options);
		return  count($data) ? $data[0]->id : false;
	}

	/**
	 * If the use password is correct, set the session for current job post
	 * First check if this job is already authorized, if not then query the DB for password
	 * @param int $id
	 * @param string $psw
	 * @return boolean 
	 */
	public function jobOnwerAuth($id, $psw = null) {
		if(Yii::app()->session["auth_pass_$id"] === TRUE) {
			return TRUE;
		}
		if(Yii::app()->request->isPostRequest && isset($_POST['password'])) {
			// Not direct call, only use ajax
			$row = $this->findByPk($id);
			if(! $row) {
				return false;
			}
			if($row->password == $this->encryptPassword($psw)) {
				Yii::app()->session["auth_pass_$id"] =  TRUE;
				return true;
			}
		}
		return false;
	}

	public function encryptPassword($password) {
		return md5($password);
	}
}