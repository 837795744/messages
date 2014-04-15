<?php 
	class RepliesController extends AppController{
		var $uses = array('User','Message','Reply');
		public $helpers = array('Form', 'Html', 'Js', 'Time');

		public function refer($msgid,$content){
			$this->checkUser();
			if($this->request->is('post')){
				if($this->Reply->saveAll($this->data)){
					$this->Session->setFlash('回复留言成功');
					$this->redirect(array('controller'=>'msg','action'=>'index'));exit();
				}else{
					$this->Session->setFlash('回复留言失败');
				}
			}else{
				$this->set('msgid',$msgid);
				$this->set('content',$content);
			}
		}

		public function reply($msgid){
			$this->checkUser();
			if($this->request->is('post')){
				if($this->Reply->saveAll($this->data)){
					$this->Session->setFlash('回复留言成功');
					$this->redirect(array('controller'=>'msg','action'=>'index'));exit();
				}else{
					$this->Session->setFlash('回复留言失败');
				}
			}else{
				$this->set('msgid',$msgid);
			}
		}
	}
?>