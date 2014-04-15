<?php 
	class AdminController extends AppController{
		var $uses = array('User','Message','Reply','Word');
		public $Helpers = array('Form','Html','Js','Time');
		public $components = array('Paginator');
		public $paginate = array(
	        'fields' => array('Message.uid', 'Message.content','Message.postdate'),
	        'limit' => 4,
	        'order' => array(
	            'Message.postdate' => 'desc'
	        )
	    );

	    //所有的操作先检查用的身份信息。不是管理员，不应许操作。
	    public function beforeFilter(){
	    	parent::beforeFilter();
	    	$this->checkAdmin();
	    }
		public function index(){
			$this->Paginator->settings = $this->paginate;
		    // similar to findAll(), but fetches paged results
		    $data = $this->Paginator->paginate('Message');
		    foreach ($data as $key => $value) {
		    	$params = array(
		    		'conditions'=> array(
		    				'id'=>$value['Message']['uid']),
		    				'fields'=>array('User.username')
		    		);	    	
		    	$user = $this->User->find('first',$params);
		    	$data[$key]['Message']['username']  = $user['User']['username']; 
		    }
		    $this->set('data', $data);
		}
		public function del_message($msgid){
			if($msgid!=0){
				if($this->Message->delete($msgid,true)){
					$this->redirect('index',null,true);
				}
			}else{
				$this->Session->setFlash('删除数据失败');
			}
		}

		public function words(){
			$this->Paginator->settings = array(
					'fields' => array('Word.id', 'Word.content'),
					'limit' => 4,
					'order' => 'Word.id asc'
				);
			$data = $this->Paginator->paginate('Word');
			$this->set('data',$data);
		}

		public function add_word(){
				if($this->request->is('post')){
					if($this->Word->save($this->data)){
						$this->Session->setFlash('添加关键词成功');
						$this->redirect('words');
					}else{
						$this->Session->setFlash('添加关键词失败');
					}
				}
		}

		//可以和add_word写到一起。
		public function edit_word($id){
				if($this->request->is('post')){
					if($this->Word->save($this->data)){
						$this->Session->setFlash('添加关键词成功');
						$this->redirect('words');exit();
					}else{
						$this->Session->setFlash('添加关键词失败');
					}
				}else{
					$this->set('word',$this->Word->findById($id));
				}
		}
		public function del_word($id){
			if($id!=0){
				if($this->Word->delete($id)){
					$this->Session->setFlash('删除关键词成功');
					$this->redirect('words');exit();
				}else{
					$this->Session->setFlash('删除关键词失败');
				}
			}
		}

		public function switch_style(){
			$this->switch_theme();
		}
	}
 ?>