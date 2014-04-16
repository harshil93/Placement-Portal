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
		$username = $this->username;
		$connection = Yii::App()->db;
        $sql = "select email_id,password from login where email_id = :email_id";
        $users = $connection->createCommand($sql)->bindValue('email_id',$username)->queryRow();
		$sql = "select email_id,password where `email_id`='".$username."';";
		if(!isset($users['email_id']))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users['password']!== md5($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}
}