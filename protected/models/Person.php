<?php

/**
 * This is the model class for table "person".
 *
 * The followings are the available columns in table 'person':
 * @property integer $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property integer $department_id
 * @property integer $company_id
 * @property integer $user_id
 * @property integer $status
 * @property string $position
 *
 * The followings are the available model relations:
 * @property Department[] $departments
 * @property Device[] $devices
 * @property Inventory[] $inventories
 * @property User $user
 * @property Department $department
 */
class Person extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'person';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, middle_name, last_name, company_id, status, position', 'required'),
			array('department_id, company_id, user_id, status', 'numerical', 'integerOnly'=>true),
			array('first_name, middle_name, last_name, position', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, first_name, middle_name, last_name, department_id, company_id, user_id, status, position', 'safe', 'on'=>'search'),
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
			'departments' => array(self::HAS_MANY, 'Department', 'lead_person_id'),
			'devices' => array(self::HAS_MANY, 'Device', 'person_id'),
			'inventories' => array(self::HAS_MANY, 'Inventory', 'person_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'department' => array(self::BELONGS_TO, 'Department', 'department_id'),
                        'company' => array(self::BELONGS_TO, 'Company', 'company_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'first_name' => 'Имя',
			'middle_name' => 'Отчество',
			'last_name' => 'Фамилия',
			'department_id' => 'Подразделение',
			'company_id' => 'Организация',
			'user_id' => 'Пользователь',
			'status' => 'Статус',
			'position' => 'Должность',
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
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('middle_name',$this->middle_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('department_id',$this->department_id);
		$criteria->compare('company_id',$this->company_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('position',$this->position,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Person the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        /*Возвращяет полное имя по id*/
        public static function getName($id)
        {
            $model = self::model()->findByPk($id);
            return $model->last_name." ".$model->first_name." ".$model->middle_name;
        }
        
        public static function getList()
        {
            $data = self::model()->findAll();
            $result = array();
            if(!empty($data))
            {
              foreach($data as $record)
              {
                $result[$record->id]=$record->last_name;
              }
            }
            return $result;
        }
}
