
<?php echo $this->Html->css('examples');?>
<div class="login">
<?php 
    echo  $this->Form->create('User');
    echo  $this->Form->input('username',array('label'=>'用户名'));
    echo  $this->Form->input('password',array('label'=>'密码'));
    echo  $this->Form->input('remember',array('type'=>'checkbox','label'=>'记住我'));
    echo  $this->Form->end('登陆');
    echo  $this->Html->link('注册',array('controller'=>'users','action'=>'register'),array('class'=>'btn btn-info'));
?>
</div>