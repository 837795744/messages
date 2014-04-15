
<?php
	
	//echo $user['User']['name'];	//好烦。。尼玛没有一点拓展性么？
	// echo $reply['id'];
	// echo $reply['uid'];
	// echo $reply['msgid'];
	// echo $reply['content'];
	// echo $reply['postdate'];
	//echo $reply['username'];
 ?>
<div class="reply col-8">
	<div class="replytitle">
		<p class="col-6"><b class="light"><?php echo $reply['username'];?></b></p>
		<p class='col-6'><?php echo $reply['postdate'];?></p>
	</div>

	<div class="replycontent col-12">
		<?php echo $reply['content']; ?>
	</div>
</div>