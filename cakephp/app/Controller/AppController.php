<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	var $view = 'Theme';
	var $theme = '';
	public $components = array('DebugKit.Toolbar','Session');


	public function checkUser(){
		$user = $this->Session->read('User');
		if(empty($user) || $user['is_admin'] == 1){
			$this->redirect(array('controller'=>'users','action'=>'login'));
		}
	}

	public function checkAdmin(){
		$user = $this->Session->read('User');
		if( !($user && $user['is_admin'] == 1)){
			$this->redirect(array('controller'=>'users','action'=>'login'));
		}
	}

	public function beforeFilter(){
		$theme = $this->Session->read('Theme');
		if(!empty($theme)){
			$this->theme = $theme;
		}		
	}

	public function switch_theme(){
		$theme = $this->Session->read('Theme');
		if($theme==''){
			$this->Session->write('Theme','coclo');
		}else{
			$this->Session->write('Theme','');
		}
		$this->redirect(array('controller'=>'admin','action'=>'index'));
	}  
}
