<?php
	class User extends AppModel {
		
		public $name = 'User';
		var $fields = array( 'username' => 'username', 'password' => 'password', );

		var $hasMany = array(
				'Messages' => array(
						'className' => 'Message',
						'foreignKey' => 'uid',
						'order' => 'Messages.postdate DESC',
					),
				'Replies' => array(
						'className' => 'Reply',
						'foreignKey' => 'uid',
						'order' => 'Replies.postdate DESC',
					)
			); 
		public $validate = array(
				'username' => array(
					array(
						'rule' => 'isUnique',
						'message' => '用户名必须惟一'
					),
					array(
						'rule' => array('minLength',5),
						'message' => '用户名字段太短'
					),
					array(
						'rule' => array('maxLength',18),
						'message' => '用户名太长，请重新输入'
					)
				),
				'password' => array(
					array(
						'rule' => array('minLength',8),
						'message' => '密码太短'
					)
				),
				'email' => array(
					array(
						'rule' => 'email'
					)
				),
				'password_confirm' => array(
      				'required'=>'notEmpty',
			      	'match'=>array(
			        	'rule' => 'validatePasswdConfirm',
			        	'message' => '密码不匹配'
			      	)
    			)
		);

		function validatePasswdConfirm($data)
	  	{
	   		if ($this->data['User']['password'] !== $data['password_confirm'])
	   		{
	     		return false;
	    	}
	   		return true;
	 	}
		
		public function beforeSave($options=array()){
			if(isset($this->data[$this->alias]['password'])){
				$this->data[$this->alias]['password'] = md5($this->data[$this->alias]['password']); 
			}			
			return true;
		}
	}
?>