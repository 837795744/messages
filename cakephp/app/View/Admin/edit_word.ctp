<?php echo $this->Html->link('留言管理',array('controller'=>'admin','action'=>'index'),array('class'=>'btn btn-success')); ?>
<?php echo $this->Html->link('关键词管理',array('controller'=>'admin','action'=>'words'),array('class'=>'btn btn-info')); ?>
<?php

	//echo $this->Form->inputs(array('legend' => '添加关键词'));
	echo $this->Form->create('Word');
	echo $this->Form->input('Word.id',array('type'=>'hidden','value'=>$word['Word']['id']));
	echo $this->Form->input('content',array('label'=>'内容','rows'=>6,'value'=>$word['Word']['content']));
	//echo $this->Form->reset('重置',array('class'=>'btn btn-danger col-1'));
	echo $this->Form->end('添加');
 ?>