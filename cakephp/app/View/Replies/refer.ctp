<?php 
	$user = $this->Session->read('User');
	echo $this->Form->create('Reply');
	echo $this->Form->input('User.id',array('type'=>'hidden','value'=>$user['id']));
	echo $this->Form->input('username',array('type'=>'hidden','value'=>$user['username']));
	echo $this->Form->input('Message.id',array('type'=>'hidden','value'=>$msgid));
	echo $this->Form->input('content',array('label'=>'内容','rows'=>5,'rows'=>10,'value'=>$content));
	echo $this->Form->end('提交回复');
?>