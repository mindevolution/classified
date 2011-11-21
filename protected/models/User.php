<?php

/**
 * This is the model class for table "classified_user".
 *
 * The followings are the available columns in table 'classified_user':
 * @property integer $uid
 * @property string $username
 * @property string $ip
 * @property string $password
 * @property string $email
 * @property integer $rid
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
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
		return 'classified_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid', 'required'),
			array('uid, rid', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>245),
			array('ip, email', 'length', 'max'=>45),
			array('password', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('uid, username, ip, password, email, rid', 'safe', 'on'=>'search'),
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
			'uid' => 'Uid',
			'username' => 'Username',
			'ip' => 'Ip',
			'password' => 'Password',
			'email' => 'Email',
			'rid' => 'Rid',
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

		$criteria->compare('uid',$this->uid);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('rid',$this->rid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

}