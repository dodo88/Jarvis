<?php

/**
 * This is the model class for table "answer_sheets".
 *
 * The followings are the available columns in table 'answer_sheets':
 * @property integer $answer_sheet_id
 * @property string $date_submitted
 * @property string $responder_name
 *
 * The followings are the available model relations:
 * @property Answers[] $answers
 */
class AnswerSheet extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AnswerSheet the static model class
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
		return 'answer_sheets';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('responder_name', 'length', 'max'=>256),
			array('date_submitted', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('answer_sheet_id, date_submitted, responder_name', 'safe', 'on'=>'search'),
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
			'answers' => array(self::HAS_MANY, 'Answers', 'answer_sheet_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'answer_sheet_id' => 'Answer Sheet',
			'date_submitted' => 'Date Submitted',
			'responder_name' => 'Responder Name',
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

		$criteria->compare('answer_sheet_id',$this->answer_sheet_id);
		$criteria->compare('date_submitted',$this->date_submitted,true);
		$criteria->compare('responder_name',$this->responder_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}