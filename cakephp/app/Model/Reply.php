<?php 
	class Reply extends AppModel{
		var $name = 'Reply';
		var $fields = array('username'=>'User.username');
		var $belongsTo = array(
				'Message' => array(
						'className' => 'Message',
						'foreignKey' => 'msgid'
					),
				'User' => array(
						'className' => 'User',
						'foreignKey' => 'uid'
					)
			);
	

	}
?>