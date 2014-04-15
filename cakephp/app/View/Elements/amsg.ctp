
<div class="msg col-12 shadow">
	<div class="msgtitle col-12">
		<blockquote><p class="col-8 light "><strong><?php  echo $msg['User']['username'];?></strong>
		<small><?php  echo $msg['Message']['postdate'];?></small></p>
		<p class="col-4">
		<small><?php echo $this->Html->link('引用',array('controller'=>'replies','action'=>'refer',$msg['Message']['id'],$msg['Message']['content']),array('class'=>'text-success'));?></small></blockquote>
		</p>
	</div>
	<hr/>
	<div class="msgcontent col-12">
		<?php echo $msg['Message']['content'];?>
	</div>
	<div class="col-12">
		<div>
			<?php foreach ($msg['Replies'] as $reply) {
				echo $this->element('reply',array('reply'=>$reply));
			}?>
		</div>
		<div class="slidebar">
			<small><a href="#" class="text-warning">赞</a></small>
			<small><a href="#" class="text-error">吐槽</a></small>
			<small><?php echo $this->Html->link('回复',array('controller' => 'replies','action' => 'reply',$msg['Message']['id']),array('class'=>'text-info'));?></small>
		</div>	
	</div>
</div>
