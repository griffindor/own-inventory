<?php

/**
 * This is the model class for table "device".
 *
 * The followings are the available columns in table 'device':
 * @property integer $id
 * @property integer $type_id
 * @property integer $person_id
 * @property string $name
 * @property string $description
 * @property string $barcode
 * @property integer $status
 * @property integer $parent_id
 * @property integer $contractor_id 
 *
 * The followings are the available model relations:
 * @property Device $parent
 * @property Device[] $devices
 * @property Person $person
 * @property Type $type
 * @property Warranty[] $warranties
 * @property Contractor $contractor
 */
class Device extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'device';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, status', 'required'),
			array('type_id, person_id, status, parent_id, contractor_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('barcode', 'length', 'max'=>50),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, type_id, person_id, name, description, barcode, status, parent_id, contractor_id', 'safe', 'on'=>'search'),
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
			'parent' => array(self::BELONGS_TO, 'Device', 'parent_id'),
			'devices' => array(self::HAS_MANY, 'Device', 'parent_id'),
			'person' => array(self::BELONGS_TO, 'Person', 'person_id'),
			'type' => array(self::BELONGS_TO, 'Type', 'type_id'),
                        'contractor' => array(self::BELONGS_TO, 'Contractor', 'contractor_id'),
			'warranties' => array(self::HAS_MANY, 'Warranty', 'dev_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type_id' => 'Тип',
			'person_id' => 'Ответственный',
			'name' => 'Название',
			'description' => 'Описание',
			'barcode' => 'Штрихкод',
			'status' => 'Статус',
			'parent_id' => 'Родитель',
                        'contractor_id' => 'Контрагент',
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
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('person_id',$this->person_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('barcode',$this->barcode,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('parent_id',$this->parent_id);
                $criteria->compare('contractor_id',$this->contractor_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Device the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
