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
    private $_id;
    private $_email_id;
    private $_level;
	public function authenticate()
	{

		$username = $this->username;
		$connection = Yii::App()->db;
        $sql = "select id,level,email_id,password from login where email_id = :email_id";
        $users = $connection->createCommand($sql)->bindValue('email_id',$username)->queryRow();
		$sql = "select email_id,password where `email_id`='".$username."';";
		if(!isset($users['email_id']))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users['password']!== md5($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
        {
            $this->_id=$users['id'];
            Yii::app()->session['role'] = $users["level"];
            $this->_email_id=$users["email_id"];
            $this->_level=$users["level"];

            $this->errorCode=self::ERROR_NONE;
        }
		return !$this->errorCode;
	}

    public function getUsername(){
        return $this->username;
    }
    public function getId(){
        return $this->_id;
    }

    public function getEmail_id(){
        return $this->_email_id;
    }

    public function getLevel(){
        return $this->_level;
    }
}