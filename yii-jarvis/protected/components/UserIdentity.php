<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$jarvisUser = new JarvisUser();
		$jarvisUser->username = $this->username;
		$jarvisUser->password = sha1($this->password);
		
		$search_result = $jarvisUser->search();
		$count = $search_result->getItemCount();
		
		if($count != 1)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		
		// elseif($users[$this->username]!==$this->password)
		//	$this->errorCode=self::ERROR_PASSWORD_INVALID;
		
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}
}