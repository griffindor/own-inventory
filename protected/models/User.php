<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property integer $role_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Inventory[] $inventories
 * @property Person[] $people
 * @property Role $role
 */
class User extends CActiveRecord
{
    public $confirm;
    public $old_password;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email, role_id, status', 'required', 'on'=>'registration'),
			array('role_id, status', 'numerical', 'integerOnly'=>true),
			array('username, password, email', 'length', 'max'=>255),
                        array('username, email', 'unique'),
                        array('email', 'email'),
                        array('confirm', 'confirm', 'on'=>'registration'),
                        array('confirm', 'confirm', 'on'=>'restore'),
                        array('old_password', 'check', 'on'=>'restore'),
                        
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, email, role_id, status', 'safe', 'on'=>'search'),
		);
	}
        
        public function confirm($attribute,$params)
	{
            if(!$this->hasErrors())
            {
                if($this->password!==$this->confirm)
                {
                    $this->addError('password','Пароли не совпадают.');
                }
            }
	}
        
        public function check($attribute,$params)
	{
            if(!$this->hasErrors())
            {
                $user = self::model()->findByAttributes(['username'=>$this->username]);
                if(empty($user))
                {
                    $this->addError('username','Пользователь не найден.');
                }
                else 
                {
                    if($user->password!==UserFunctions::encode($this->old_password))
                    {
                        $this->addError('old_password', 'Неверный пароль');
                    }
                }
            }
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'inventories' => array(self::HAS_MANY, 'Inventory', 'user_id'),
			'people' => array(self::HAS_MANY, 'Person', 'user_id'),
			'role' => array(self::BELONGS_TO, 'Role', 'role_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Логин',
			'password' => 'Пароль',
                        'confirm' => 'Еще раз',
			'email' => 'Email',
			'role_id' => 'Role',
			'status' => 'Status',
                        'old_password' => 'Старый пароль'
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function createRestoreLink($model)
        {
            $link = Yii::app()->createAbsoluteUrl('site/restore',['sid'=>$model->id, 'rel'=>$model->password]);
            return $link;
        }
        
        public static function role()
        {
            return self::model()->findByPk(Yii::app()->user->id)->role->name;
        }
        
        public static function getName($id)
        {
            $model = $this->model()->findByPk($id);
            return $model->username;
        }
        
        public static function getList()
        {
            $data = self::model()->findAll();
            $result = array();
            if(!empty($data))
            {
              foreach($data as $record)
              {
                $result[$record->id]=$record->username;
              }
            }
            return $result;
        }
}
