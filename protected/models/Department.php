<?php

/**
 * This is the model class for table "department".
 *
 * The followings are the available columns in table 'department':
 * @property integer $id
 * @property integer $company_id
 * @property string $name
 * @property integer $parent_id
 * @property string $desc
 * @property integer $lead_person_id
 *
 * The followings are the available model relations:
 * @property Person $leadPerson
 * @property Company $company
 * @property Department $parent
 * @property Department[] $departments
 * @property Inventory[] $inventories
 * @property Person[] $people
 */
class Department extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'department';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_id, name, lead_person_id', 'required'),
			array('company_id, parent_id, lead_person_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('desc', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, company_id, name, parent_id, desc, lead_person_id', 'safe', 'on'=>'search'),
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
			'leadPerson' => array(self::BELONGS_TO, 'Person', 'lead_person_id'),
			'company' => array(self::BELONGS_TO, 'Company', 'company_id'),
			'parent' => array(self::BELONGS_TO, 'Department', 'parent_id'),
			'departments' => array(self::HAS_MANY, 'Department', 'parent_id'),
			'inventories' => array(self::HAS_MANY, 'Inventory', 'department_id'),
			'people' => array(self::HAS_MANY, 'Person', 'department_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'company_id' => 'Организация',
			'name' => 'Название',
			'parent_id' => 'Родитель',
			'desc' => 'Описание',
			'lead_person_id' => 'Руководитель',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('lead_person_id',$this->lead_person_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Department the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
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
        
        public static function createTree()
        {
            $elems = array();
            $data = self::model()->findAll();
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $item=array('id'=>$row->id, 'pid'=>$row->parent_id, 'text'=>$row->name, 'expanded'=>false);
                    array_push($elems, $item);
                }
            }
            $links = array();
            $tree = array();
            for( $q = 0; $q < count( $elems ); $q++ )
            {
                $elem = $elems[$q];   
                if( $elem['pid'] === null )
                {
                    $tree[$elem['id']] = $elem;
                    $links[$elem['id']] = &$tree[$elem['id']];
                }
                else
                {
                    $links[$elem['pid']]['children'][$elem['id']] = $elem;
                    $links[$elem['id']] = &$links[$elem['pid']]['children'][$elem['id']];
                }
            }
            return $tree;
        }
}
