<?php

/**
 * This is the model class for table "type".
 *
 * The followings are the available columns in table 'type':
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 * @property string $desc
 *
 * The followings are the available model relations:
 * @property Device[] $devices
 * @property Type $parent
 * @property Type[] $types
 */
class Type extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('parent_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('desc', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, parent_id, desc', 'safe', 'on'=>'search'),
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
			'devices' => array(self::HAS_MANY, 'Device', 'type_id'),
			'parent' => array(self::BELONGS_TO, 'Type', 'parent_id'),
			'types' => array(self::HAS_MANY, 'Type', 'parent_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Тип',
			'parent_id' => 'Родитель',
			'desc' => 'Описание',
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
		$criteria->compare('desc',$this->desc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Type the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
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
