<?php
	class UsersController extends AppController{
		public $helpers = array('Form', 'Html', 'Js', 'Time');
		public $components = array('Session');

		public function beforeFilter(){
			parent::beforeFilter();
		}
		public function admin_index() {
            $users = $this->paginate($this->User, array(
                'User.is_active' => 0
            ));
            $this->set(compact('users'));
        }

		public function admin_user_activate($id = null) {
            if ($id) {
                $this->User->id = $id;
                if ($this->User->saveField('is_active', 1)) {
                    return $this->redirect(array(
                        'controller' => 'users',
                        'action' => 'index',
                        'admin' => true
                    ));
                }
                
            }
        }


		public function login(){
			if ($this->request->is('post')) {			
				$result = $this->User->findByUsername($this->data['User']['username']);
				//var_dump($result);exit();
				if( $result && $result['User']['password'] == md5($this->data['User']['password'])){
					$result['User']['is_active'] = 1;
					$this->Session->write('User',$result['User']);
					if($result['User']['is_admin']){
						$this->redirect(array('controller'=>'admin','action'=>'index'));exit();
					}else{
						$this->redirect(array('controller'=>'msg','action'=>'index'));exit();
					}						
				}else{
					$this->Session->setFlash(__('用户名或者密码错误'));
				}
				
			}
		}

		public function register(){
			$this->set('title_for_layout', '注册');
			if($this->request->is('post')){
				//对会员注册使用MD5加密
				$this->User->create();
				if($this->User->save($this->data)){
					$this->Session->setFlash('注册成功.');
					$this->redirect(array('action'=>'login'));exit();
				}else{
					$this->Session->setFlash('注册用户失败');
					//$this->redirect(array('action'=>'register'));
				}
			}
		}
		
		public function logout(){
			$this->Session->delete('User');
			$this->redirect(array('controller'=>'msg','action'=>'index'));
		}

	}
?>