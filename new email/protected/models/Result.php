<?php

/**
 * This is the model class for table "results".
 *
 * The followings are the available columns in table 'results':
 * @property integer $id
 * @property string $question_name
 * @property string $client_name
 * @property string $answer
 * @property string $date_submitted
 */
class Result extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Result the static model class
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
		return 'results';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('question_name, client_name, answer', 'length', 'max'=>255),
			array('date_submitted', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, question_name, client_name, answer, date_submitted', 'safe', 'on'=>'search'),
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
			'question_name' => 'Question Name',
			'client_name' => 'Client Name',
			'answer' => 'Answer',
			'date_submitted' => 'Date Submitted',
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
		$criteria->compare('question_name',$this->question_name,true);
		$criteria->compare('client_name',$this->client_name,true);
		$criteria->compare('answer',$this->answer,true);
		$criteria->compare('date_submitted',$this->date_submitted,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}