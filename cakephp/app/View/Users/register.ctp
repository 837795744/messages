
<?php echo $this->Html->css('examples');?>
<div class="login">
<?
	echo $this->Form->create('User');
	echo $this->Form->input('username',array('label'=>'用户名'));
	echo $this->Form->input('password',array('label'=>'密码'));
	echo $this->Form->input('password_confirm', array('label'=>'确认密码','type' => 'password'));
	echo $this->Form->input('email',array('label'=>'电子邮箱'));
	echo $this->Form->end('提交');
?>
</div>