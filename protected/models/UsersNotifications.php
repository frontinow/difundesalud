<?php

/**
 * This is the model class for table "users_notifications".
 *
 * The followings are the available columns in table 'users_notifications':
 * @property integer $id
 * @property integer $user_id
 * @property integer $type_frequency
 * @property string $time_send
 * @property integer $monday
 * @property integer $tuesday
 * @property integer $wednesday
 * @property integer $thursday
 * @property integer $friday
 * @property integer $saturday
 * @property integer $sunday
 * @property integer $all_notifications
 * @property integer $before_day
 * @property string $date
 * @property string $time
 *
 * The followings are the available model relations:
 * @property Users $user
 */
class UsersNotifications extends CActiveRecordExt
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users_notifications';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, date, time', 'required'),
			array('user_id, type_frequency, monday, tuesday, wednesday, thursday, friday, saturday, sunday, all_notifications, before_day', 'numerical', 'integerOnly'=>true),
			array('time_send', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, type_frequency, time_send, monday, tuesday, wednesday, thursday, friday, saturday, sunday, all_notifications, before_day, date, time', 'safe', 'on'=>'search'),
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
			'type_frequency' => 'Frequencia de Notificationes',
			'time_send' => 'Hora de Envio',
			'monday' => 'Lunes',
			'tuesday' => 'Martes',
			'wednesday' => 'Miercoles',
			'thursday' => 'Jueves',
			'friday' => 'Viernes',
			'saturday' => 'Sabado',
			'sunday' => 'Domingo',
			'all_notifications' => 'Todas las Notificationes',
			'before_day' => 'Desear ser notificado un dia antes del evento marcado como favorito',
			'date' => 'Fecha',
			'time' => 'Hora',
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
		$criteria->compare('type_frequency',$this->type_frequency);
		$criteria->compare('time_send',$this->time_send,true);
		$criteria->compare('monday',$this->monday);
		$criteria->compare('tuesday',$this->tuesday);
		$criteria->compare('wednesday',$this->wednesday);
		$criteria->compare('thursday',$this->thursday);
		$criteria->compare('friday',$this->friday);
		$criteria->compare('saturday',$this->saturday);
		$criteria->compare('sunday',$this->sunday);
		$criteria->compare('all_notifications',$this->all_notifications);
		$criteria->compare('before_day',$this->before_day);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('time',$this->time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsersNotifications the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
        public static function getListType(){            
            
            return array(0=>'No Notificar',1=>'Diarias',2=>'Semanales',3=>'Mensuales');
        }
        
        
        
}
