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
class Question extends CActiveRecord
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
		return 'questions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content,answer_1,answer_2,answer_3,answer_4','length', 'max'=>255),
			array('name', 'length', 'max'=>40),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, content,answer_1,answer_2,answer_3,answer_4', 'safe', 'on'=>'search'),
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
			'id' => 'Question ID #',
			'name' => 'Name',
			'content' => 'Content',
			'answer_1' => 'Answer 1',
			'answer_2' => 'Answer 2',
			'answer_3' => 'Answer 3',
			'answer_4' => 'Answer 4',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('answer_1',$this->content,true);
		$criteria->compare('answer_2',$this->content,true);	
		$criteria->compare('answer_3',$this->content,true);	
		$criteria->compare('answer_4',$this->content,true);			
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function getQuestion()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria();
		$criteria->compare('id',$this->id);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>false,
		));
	}
	public function searchQuestion()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('answer_1',$this->answer_1,true);	
		$criteria->compare('answer_2',$this->answer_2,true);	
		$criteria->compare('answer_3',$this->answer_3,true);	
		$criteria->compare('answer_4',$this->answer_4,true);	
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function findQuestionByName($question_name)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		//$criteria->condition='name = Phone';
		//$criteria->compare('id',$this->id);
		
		//$criteria->compare('content',$this->content,true);
		//$criteria->compare('answer_1',$this->answer_1,true);	
		//$criteria->compare('answer_2',$this->answer_2,true);	
		//$criteria->compare('answer_3',$this->answer_3,true);	
		//$criteria->compare('answer_4',$this->answer_4,true);
		$criteria->compare('name',$question_name,true);		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}