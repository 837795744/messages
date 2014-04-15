<?php 
	class MsgController extends AppController{
		var $uses = array('Message','Word','User');
		//var $scaffold;
		public $Helpers = array('Form','Html','Js','Time');
		public $components = array('Session');

		
		public function index(){
			$this->set('msgs',$this->Message->find('all'));
		}

		public function add(){
			$this->checkUser();
			if($this->request->is('post')){//判断是否是post的方法提交
				$sexwords = $this->transgress_keyword($this->request->data['Message']['content']);
				if($sexwords == ''){
					$this->Message->create();
					if($this->Message->saveAll($this->data)){
						$this->Session->setFlash('你的留言应经提交成功');
						$this->redirect(array('action'=>'index'));
					}else{
						$this->Session->setFlash('留言提交失败，请检查是否有敏感词');
					}
				}else{
					
					$this->Session->setFlash('敏感词 ['.$sexwords.']');
				}
				
			}
		}

		function transgress_keyword($content){			//定义处理违法关键字的方法
			$keyword =  $this->Word->find('all');	//敏感词
			$sexword = '';
			foreach ($keyword as $word) {
				if(substr_count($content, $word['Word']['content'])>0){
					$sexword.=$word['Word']['content'].',';
				}
			}
			return $sexword;				//返回变量值，根据变量值判断是否存在敏感词
		}

	}
?>