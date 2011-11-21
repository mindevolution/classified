<?php

/**
 * This is the model class for table "classified_area".
 *
 * The followings are the available columns in table 'classified_area':
 * @property integer $aid
 * @property string $name
 * @property string $pid
 * @property integer $weight
 */
class Area extends CActiveRecord
{
	/**
	 * The root pid
	 */
	const PID_ROOT = 0;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Area the static model class
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
		return 'classified_area';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('aid, name, pid', 'required'),
			array('aid, weight', 'numerical', 'integerOnly'=>true),
			array('name, pid', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('aid, name, pid, weight', 'safe', 'on'=>'search'),
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
			'aid' => 'Aid',
			'name' => 'Name',
			'pid' => 'Parent',
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

		$criteria->compare('aid',$this->aid);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('pid',$this->pid,true);
		$criteria->compare('weight',$this->weight);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Retrieves the areas and set to the areas property
	 * Can be used in the drop down menu
	 */
	static public function getAreasByPid($pid = 0) {
		$options = array(
			'select' => 'aid, name',
			'condition' => 'pid=:pid',
			'params' => array(':pid' => $pid),
			'order' => 'weight asc',
		);
		$data = self::model()->findAll($options);
//		$rows = array('0' => 'Root');
		$rows = array();
		foreach($data as $i => $row) {
			$rows[$row['aid']] = $row['name'];
		}
		return $rows;
	}

	function getAreaNameByPk($aid) {
		$aid = (int) $aid;
		if(!$aid) {
			$return = "Root";
		} else {
			$options = array(
				'select' => 'aid, name',
				'condition' => 'aid=:aid',
				'params' => array(':aid' => $aid),
			);
			$data = $this->find($options);
			$return = $data->name;
		}
		return $return;
	}

	static public function getAreas($pid = 0)
	{
		$data = self::model()->findAll('pid=:pid ORDER BY weight ASC', array(':pid'=>$pid));
		$rows = array();
		foreach($data as $v) {
			$rows[$v->aid] = $v->name;
		}

		if(! count($rows))
			return false;
		return $rows;
	}

}
