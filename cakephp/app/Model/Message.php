<?php 
	class Message extends AppModel{
		public $name = 'Message';

		var $belongsTo = array(
				'User' => array(
						'className' => 'User',
						'foreignKey' => 'uid'
					)
			);
		var $hasMany = array(
				'Replies' => array(
						'className' => 'Reply',
						'foreignKey' => 'msgid',
						'dependent' => true
					)
			);
		public $validate = array(
				'content' => array(
					'rule' => 'notEmpty'
				)
			);

	}
?>