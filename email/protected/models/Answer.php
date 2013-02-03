<?php

/**
 * This is the model class for table "answers".
 *
 * The followings are the available columns in table 'answers':
 * @property integer $answer_sheet_id
 * @property integer $question_id
 * @property string $answer_content
 *
 * The followings are the available model relations:
 * @property Questions $question
 * @property AnswerSheets $answerSheet
 */
class Answer {
	private $answer_sheet_id;
	private $question_id;
	private $answer_content;
	
	public getAnswerSheetId() {
		return $this->answer_sheet_id;
	}
	
	public setAnswerSheetId($id) {}
}