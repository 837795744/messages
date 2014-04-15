
<?php echo $this->Html->link('留言管理',array('controller'=>'admin','action'=>'index'),array('class'=>'btn btn-success')); ?>
<?php echo $this->Html->link('关键词管理',array('controller'=>'admin','action'=>'words'),array('class'=>'btn btn-info')); ?>
<table>
    <tr>
        <th>留言人</th>
        <th width="550px"><?php echo $this->Paginator->sort('content', '内容'); ?></th>
        <th><?php echo $this->Paginator->sort('postdate', '留言时间'); ?></th>
        <th>操作</th>
    </tr>
    <?php foreach ($data as $msg): ?>
    <tr>
        <td><?php echo $msg['Message']['username']; ?> </td>
        <td><?php echo h($msg['Message']['content']); ?> </td>
        <td><?php echo h($msg['Message']['postdate']); ?> </td>
        <td>
        	<?php echo $this->Html->link('删除留言',array('controller'=>'admin','action'=>'del_message',$msg['Message']['id']),array('class'=>'btn btn-danger')); ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php // Shows the page numbers
			echo $this->Paginator->numbers();

			// Shows the next and previous links
			echo $this->Paginator->prev('«上一页', null, null, array('class' => 'disable'));
			echo $this->Paginator->next('下一页 »', null, null, array('class' => 'disable'));

			// prints X of Y, where X is current page and Y is number of pages
			echo $this->Paginator->counter(); 
?>
