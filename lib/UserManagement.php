<?php
class UserManagement {
	protected $_userID;
	function __construct(){
		if(!empty($_COOKIE['userIdentificationHash'])){
			$this->_userID = $_COOKIE['userIdentificationHash'];
		} else {
			$this->_generateUserID();
		}
			$this->_setCookie();
	}

	public function getUserID(){
		return $this->_userID;
	}

	public function clearCookie(){
		setcookie("userIdentificationHash", null, strtotime("-1 day"), "/", ".redtag.ca", false, true);
	}

	private function _generateUserID(){
		$this->_userID = uniqid(rand(), true);
	}

	private function _setCookie(){
		setcookie('userIdentificationHash', $this->_userID, strtotime("+1 year"), "/", ".redtag.ca", false, true);
	}
}
