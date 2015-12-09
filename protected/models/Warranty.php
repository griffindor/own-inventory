<?php

/**
 * This is the model class for table "warranty".
 *
 * The followings are the available columns in table 'warranty':
 * @property integer $id
 * @property integer $dev_id
 * @property string $dt_start
 * @property integer $period
 * @property string $dt_end
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Device $dev
 */
class Warranty extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'warranty';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dev_id, dt_start, period, dt_end, status', 'required'),
			array('dev_id, period, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, dev_id, dt_start, period, dt_end, status', 'safe', 'on'=>'search'),
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
			'dev' => array(self::BELONGS_TO, 'Device', 'dev_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'dev_id' => 'Dev',
			'dt_start' => 'Dt Start',
			'period' => 'Period',
			'dt_end' => 'Dt End',
			'status' => 'Status',
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
		$criteria->compare('dev_id',$this->dev_id);
		$criteria->compare('dt_start',$this->dt_start,true);
		$criteria->compare('period',$this->period);
		$criteria->compare('dt_end',$this->dt_end,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Warranty the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
