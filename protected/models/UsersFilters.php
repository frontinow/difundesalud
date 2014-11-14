<?php

/**
 * This is the model class for table "users_filters".
 *
 * The followings are the available columns in table 'users_filters':
 * @property integer $id
 * @property integer $user_id
 * @property string $date
 * @property string $time
 * @property integer $state_id
 * @property integer $municipality_id
 * @property integer $parishe_id
 * @property integer $type_care
 * @property string $specify
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Users $user
 * @property States $state
 * @property Municipalities $municipality
 * @property Parishes $parishe
 * @property TypesCare $typeCare
 */
class UsersFilters extends CActiveRecordExt
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users_filters';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, date, time, active, state_id', 'required'),
			array('user_id, state_id, municipality_id, parishe_id,  active', 'numerical', 'integerOnly'=>true),
			array('specify', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, date, time, state_id, municipality_id, parishe_id, type_care, specify, active', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
			'state' => array(self::BELONGS_TO, 'States', 'state_id'),
			'municipality' => array(self::BELONGS_TO, 'Municipalities', 'municipality_id'),
			'parishe' => array(self::BELONGS_TO, 'Parishes', 'parishe_id'),
			'typeCare' => array(self::BELONGS_TO, 'TypesCare', 'type_care'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'Usuario',
			'date' => 'Fecha',
			'time' => 'Hora',
			'state_id' => 'Estado',
			'municipality_id' => 'Municipio',
			'parishe_id' => 'Parroquia',
			'type_care' => 'Atencion Medica',
			'specify' => 'Especifique',
			'active' => 'Estatus',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('state_id',$this->state_id);
		$criteria->compare('municipality_id',$this->municipality_id);
		$criteria->compare('parishe_id',$this->parishe_id);
		$criteria->compare('type_care',$this->type_care);
		$criteria->compare('specify',$this->specify,true);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsersFilters the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
