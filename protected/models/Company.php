<?php

/**
 * This is the model class for table "company".
 *
 * The followings are the available columns in table 'company':
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 * @property string $ref
 * @property string $desc
 * @property string $adress
 * @property string $email
 * @property string $phone
 * @property string $fax
 * @property string $web
 *
 * The followings are the available model relations:
 * @property Company $parent
 * @property Company[] $companies
 * @property Department[] $departments
 * @property Inventory[] $inventories
 */
class Company extends CActiveRecord
{
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'company';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, ref', 'required'),
			array('parent_id', 'numerical', 'integerOnly'=>true),
			array('name, ref, email, phone, fax, web', 'length', 'max'=>255),
			array('desc, adress', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, parent_id, ref, desc, adress, email, phone, fax, web', 'safe', 'on'=>'search'),
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
			'parent' => array(self::BELONGS_TO, 'Company', 'parent_id'),
			'companies' => array(self::HAS_MANY, 'Company', 'parent_id'),
			'departments' => array(self::HAS_MANY, 'Department', 'company_id'),
			'inventories' => array(self::HAS_MANY, 'Inventory', 'company_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Название',
			'parent_id' => 'Родитель',
			'ref' => 'Ref',
			'desc' => 'Описание',
			'adress' => 'Адрес',
			'email' => 'Email',
			'phone' => 'Телефон',
			'fax' => 'Факс',
			'web' => 'Web-сайт',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('ref',$this->ref,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('adress',$this->adress,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('web',$this->web,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Company the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function createRef()
        {
            return UserFunctions::randomString(10, false);
        }
        
        public static function findParent($ref)
        {
            $parent = self::model()->findByAttributes(['ref'=>$ref]);
            if(!empty($parent))
            {
                return $parent->id;
            }
            return null;
        }
        
        
        
        public static function getRefLink($user_id)
        {
            $person = Person::model()->findByAttributes(['user_id'=>$user_id]);
            if(!empty($person))
            {
                $url = Yii::app()->createAbsoluteUrl('company/create', array('ref'=>$person->company->ref));
            }
            else 
            {
                $url = null;
            }
            return $url;
        }
        
        public static function getName($id)
        {
            $model = $this->model()->findByPk($id);
            return $model->name;
        }
        
        public static function getList()
        {
            $data = self::model()->findAll();
            $result = array();
            if(!empty($data))
            {
              foreach($data as $record)
              {
                $result[$record->id]=$record->name;
              }
            }
            return $result;
        }
        
        
}
