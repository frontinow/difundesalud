<?php

/**
 * This is the model class for table "transactions".
 *
 * The followings are the available columns in table 'transactions':
 * @property integer $id
 * @property string $date
 * @property string $time
 * @property integer $user_id
 * @property string $module
 * @property string $url
 * @property string $ip
 * @property string $table
 * @property integer $id_fk
 * @property string $type_transaction
 * @property string $fields
 * @property string $before
 * @property string $after
 * @property string $observation
 */
class Transactions extends CActiveRecordExt
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'transactions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, time, user_id, module, url, ip, table, type_transaction, fields, before, after', 'required'),
			array('user_id, id_fk', 'numerical', 'integerOnly'=>true),
			array('observation', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, date, time, user_id, module, url, ip, table, id_fk, type_transaction, fields, before, after, observation', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'date' => 'Date',
			'time' => 'Time',
			'user_id' => 'User',
			'module' => 'Module',
			'url' => 'Url',
			'ip' => 'Ip',
			'table' => 'Table',
			'id_fk' => 'Id Fk',
			'type_transaction' => 'Type Transaction',
			'fields' => 'Fields',
			'before' => 'Before',
			'after' => 'After',
			'observation' => 'Observation',
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
		$criteria->compare('date',$this->date,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('module',$this->module,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('table',$this->table,true);
		$criteria->compare('id_fk',$this->id_fk);
		$criteria->compare('type_transaction',$this->type_transaction,true);
		$criteria->compare('fields',$this->fields,true);
		$criteria->compare('before',$this->before,true);
		$criteria->compare('after',$this->after,true);
		$criteria->compare('observation',$this->observation,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Transactions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
