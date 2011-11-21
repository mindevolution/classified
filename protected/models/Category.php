<?php

/**
 * This is the model class for table "classified_category".
 *
 * The followings are the available columns in table 'classified_category':
 * @property integer $cid
 * @property string $name
 * @property integer $pid
 * @property string $keywords
 * @property string $description
 * @property integer $weight
 */
class Category extends CActiveRecord
{
	const JOB_ROOT_ID = 1;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Category the static model class
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
		return 'classified_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cid', 'required'),
			array('cid, pid, weight', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>45),
			array('keywords, description', 'length', 'max'=>245),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cid, name, pid, keywords, description, weight', 'safe', 'on'=>'search'),
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
			'cid' => 'Cid',
			'name' => 'Name',
			'pid' => 'Pid',
			'keywords' => 'Keywords',
			'description' => 'Description',
			'weight' => 'Weight',
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

		$criteria->compare('cid',$this->cid);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('pid',$this->pid);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('weight',$this->weight);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	static public function getOptions() {
		$category = self::model()->findAll('pid=:pid ORDER BY weight ASC', array(':pid'=>self::JOB_ROOT_ID));
		$rows = array();
		foreach($category as $v) {
			$rows[$v->cid] = $v->name;
		}

		return $rows;
	}
}