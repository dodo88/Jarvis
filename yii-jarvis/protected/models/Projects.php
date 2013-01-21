<?php

/**
 * This is the model class for table "Projects".
 *
 * The followings are the available columns in table 'Projects':
 * @property integer $project_id
 * @property string $what_project
 * @property string $where_project
 * @property string $when_project
 * @property string $admin_note
 * @property string $client_name
 * @property string $client_phone
 * @property string $client_email
 * @property string $date_submit
 * @property integer $status
 */
class Projects extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Projects the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Projects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status', 'numerical', 'integerOnly'=>true),
			array('what_project, where_project, when_project, admin_note', 'length', 'max'=>255),
			array('client_name, client_phone, client_email', 'length', 'max'=>80),
			array('date_submit', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('project_id, what_project, where_project, when_project, admin_note, client_name, client_phone, client_email, date_submit, status', 'safe', 'on'=>'search'),
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
			'project_id' => 'Project ID #',
			'what_project' => 'What',
			'where_project' => 'Where',
			'when_project' => 'When',
			'admin_note' => 'Admin Note',
			'client_name' => 'Client Name',
			'client_phone' => 'Client Phone',
			'client_email' => 'Client Email',
			'date_submit' => 'Date Submitted',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('project_id',$this->project_id);
		$criteria->compare('what_project',$this->what_project,true);
		$criteria->compare('where_project',$this->where_project,true);
		$criteria->compare('when_project',$this->when_project,true);
		$criteria->compare('admin_note',$this->admin_note,true);
		$criteria->compare('client_name',$this->client_name,true);
		$criteria->compare('client_phone',$this->client_phone,true);
		$criteria->compare('client_email',$this->client_email,true);
		$criteria->compare('date_submit',$this->date_submit,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function getProject()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria();
		$criteria->compare('project_id',$this->project_id);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>false,
		));
	}
	public function searchNonApproved()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('project_id',$this->project_id);
		$criteria->compare('what_project',$this->what_project,true);
		$criteria->compare('where_project',$this->where_project,true);
		$criteria->compare('when_project',$this->when_project,true);
		$criteria->compare('admin_note',$this->admin_note,true);
		$criteria->compare('client_name',$this->client_name,true);
		$criteria->compare('client_phone',$this->client_phone,true);
		$criteria->compare('client_email',$this->client_email,true);
		$criteria->compare('date_submit',$this->date_submit,true);
		$criteria->compare('status',1);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}