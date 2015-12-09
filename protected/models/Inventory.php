<?php

/**
 * This is the model class for table "inventory".
 *
 * The followings are the available columns in table 'inventory':
 * @property integer $id
 * @property integer $company_id
 * @property integer $department_id
 * @property integer $person_id
 * @property integer $inventory_type_id
 * @property string $dt_start
 * @property string $dt_end
 * @property integer $user_id
 * @property integer $result
 *
 * The followings are the available model relations:
 * @property Department $department
 * @property Person $person
 * @property User $user
 * @property Company $company
 * @property InventoryType $inventoryType
 */
class Inventory extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'inventory';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('inventory_type_id, dt_start, dt_end, user_id, result', 'required'),
			array('company_id, department_id, person_id, inventory_type_id, user_id, result', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, company_id, department_id, person_id, inventory_type_id, dt_start, dt_end, user_id, result', 'safe', 'on'=>'search'),
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
			'department' => array(self::BELONGS_TO, 'Department', 'department_id'),
			'person' => array(self::BELONGS_TO, 'Person', 'person_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'company' => array(self::BELONGS_TO, 'Company', 'company_id'),
			'inventoryType' => array(self::BELONGS_TO, 'InventoryType', 'inventory_type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'company_id' => 'Company',
			'department_id' => 'Department',
			'person_id' => 'Person',
			'inventory_type_id' => 'Inventory Type',
			'dt_start' => 'Dt Start',
			'dt_end' => 'Dt End',
			'user_id' => 'User',
			'result' => 'Result',
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
		$criteria->compare('company_id',$this->company_id);
		$criteria->compare('department_id',$this->department_id);
		$criteria->compare('person_id',$this->person_id);
		$criteria->compare('inventory_type_id',$this->inventory_type_id);
		$criteria->compare('dt_start',$this->dt_start,true);
		$criteria->compare('dt_end',$this->dt_end,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('result',$this->result);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Inventory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
