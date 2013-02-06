<?php

/**
 * This is the model class for table "emails".
 *
 * The followings are the available columns in table 'emails':
 * @property integer $id
 * @property string $add_from
 * @property string $subject
 * @property string $content
 * @property string $website
 * @property string $facebook
 * @property string $survey
 * @property string $contact_info
 * @property string $logo
 * @property string $background
 * @property string $header
 * @property string $footer
 */
class Email extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Email the static model class
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
		return 'emails';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('add_from, subject, website, facebook, survey', 'length', 'max'=>128),
			array('contact_info', 'length', 'max'=>255),
			array('logo, background, header, footer', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, add_from, subject, content, website, facebook, survey, contact_info, logo, background, header, footer', 'safe', 'on'=>'search'),
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
			'add_from' => 'Add From',
			'subject' => 'Subject',
			'content' => 'Content',
			'website' => 'Website',
			'facebook' => 'Facebook',
			'survey' => 'Survey',
			'contact_info' => 'Contact Info',
			'logo' => 'Logo',
			'background' => 'Background',
			'header' => 'Header',
			'footer' => 'Footer',
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
		$criteria->compare('add_from',$this->add_from,true);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('facebook',$this->facebook,true);
		$criteria->compare('survey',$this->survey,true);
		$criteria->compare('contact_info',$this->contact_info,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('background',$this->background,true);
		$criteria->compare('header',$this->header,true);
		$criteria->compare('footer',$this->footer,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}