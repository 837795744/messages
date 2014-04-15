
<?php echo $this->Html->link('留言管理',array('controller'=>'admin','action'=>'index'),array('class'=>'btn btn-success')); ?>
<?php echo $this->Html->link('关键词管理',array('controller'=>'admin','action'=>'words'),array('class'=>'btn btn-info')); ?>
<table>
    <tr>
        <th><?php echo $this->Paginator->sort('content', '关键词'); ?></th>
        <th>操作</th>
    </tr>
    <?php foreach ($data as $word): ?>
    <tr>
    	<td><?php echo h($word['Word']['content']); ?></td>
        <td>
        	<?php echo $this->Html->link('编辑',array('controller'=>'admin','action'=>'edit_word',$word['Word']['id']),array('class'=>'btn btn-warning')); ?>
        	<?php echo $this->Html->link('删除',array('controller'=>'admin','action'=>'del_word',$word['Word']['id']),array('class'=>'btn btn-danger')); ?>
        </td>
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
<div class="col-12">
	<p class="text-right">
		<?php echo $this->Html->link('添加关键词',array('controller'=>'admin','action'=>'add_word'),array('class'=>'btn btn-success')); ?>
        </td>
	</p>
</div>
