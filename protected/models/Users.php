<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $name
 * @property string $lastname
 * @property string $username
 * @property string $password
 * @property integer $active
 * @property integer $rol_id
 * @property integer $failed_attempt
 * @property integer $status_user_id
 * @property integer $identity_type_id
 * @property integer $identity_number
 *
 * The followings are the available model relations:
 * @property Promotor[] $promotors
 * @property IdentityType $identityType
 * @property Roles $rol
 * @property StatusUsers $statusUser
 * @property UsersRolesItems[] $usersRolesItems
 * @property UsersToken[] $usersTokens
 */
class Users extends CActiveRecordExt {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'users';
    }

    public $passwordconfirm;
    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('username, password, active, rol_id, failed_attempt, status_user_id', 'required'),
            array('active, rol_id, failed_attempt, status_user_id, identity_type_id, identity_number', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, lastname, username, password, active, rol_id, failed_attempt, status_user_id, identity_type_id, identity_number', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'promotors' => array(self::HAS_MANY, 'Promotor', 'user_id'),
            'identityType' => array(self::BELONGS_TO, 'IdentityType', 'identity_type_id'),
            'rol' => array(self::BELONGS_TO, 'Roles', 'rol_id'),
            'statusUser' => array(self::BELONGS_TO, 'StatusUsers', 'status_user_id'),
            'usersRolesItems' => array(self::HAS_MANY, 'UsersRolesItems', 'user_id'),
            'usersTokens' => array(self::HAS_MANY, 'UsersToken', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'lastname' => 'Lastname',
            'username' => 'Username',
            'password' => 'Contraseña',
            'passwordconfirm' => 'Confirmacion de Contraseña',
            'active' => 'Active',
            'rol_id' => 'Rol',
            'failed_attempt' => 'Failed Attempt',
            'status_user_id' => 'Status User',
            'identity_type_id' => 'Identity Type',
            'identity_number' => 'Identity Number',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('lastname', $this->lastname, true);       
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('active', $this->active);
        $criteria->compare('rol_id', $this->rol_id);
        $criteria->compare('failed_attempt', $this->failed_attempt);
        $criteria->compare('status_user_id', $this->status_user_id);
        $criteria->compare('identity_type_id', $this->identity_type_id);
        $criteria->compare('identity_number', $this->identity_number);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Users the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
