<?php 
	$user = $this->Session->read('User');
	echo $this->Form->create('Message');
	echo $this->Form->input('User.id',array('type'=>'hidden','value'=>$user['id']));
	echo $this->Form->input('content',array('rows'=>6,'cols'=>60,'label'=>'留言内容'));
	echo $this->Form->end('提交留言');
?>