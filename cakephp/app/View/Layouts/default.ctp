<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
//$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('furatto');
		echo $this->Html->css('cake.generic');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header" class="content-box">
			<!--header -->
			<div class="row">
				<div class="col-6">
					<h3><?php echo $this->Html->link('一言一行，慎思言之。',array('controller'=>'msg','action'=>'index')) ?></h3>
				</div>
				<div class="flowright">
					
						<?php
						echo $this->Session->check('User') 
						? 
						$this->Html->link(
									  '登出',
						              array(
						                 'controller' => 'users',
						                 'action' => 'logout',
						                 'admin' => false
						              ),
						              array('class'=>'btn btn-danger')
						              )
						: 
						$this->Html->link(
									   '登陆',
						               array(
						                  'controller' => 'users',
						                  'action' => 'login'
						               ),
						               array('class'=>'btn btn-success')
						               );
						?>

						<?php 
							$user = $this->Session->read('User');
							if($user['is_admin']==1){
								echo $this->Html->link('切换风格',
									array('controller'=>'admin','action'=>'switch_style'),
									array('class'=>'btn btn-funky'));
							}
						?>
				</div>
				
			</div>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer" class="footer content-box">
			<div class="row">
				<div class="col-6">
					<h3>知无不言，言无不详</h3>
				</div>
			</div>
		</div>
	</div>
	<!-- <?php echo $this->element('sql_dump'); ?> DebugKit 调试修改-->
</body>
</html>
