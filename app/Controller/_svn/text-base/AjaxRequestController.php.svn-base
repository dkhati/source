<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class AjaxRequestController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'AjaxRequest';

	public $layout = 'ajax';

/**
 * Default helper
 *
 * @var array
 */
	public $helpers = array('Html', 'Session');

	public $uses = array('User');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function EmailExist($email_address) {
		$email_address=mysql_real_escape_string($email_address);
		$output= $this->User->find('count', array('conditions' => array('email_address' => $email_address)));

		if($output==0){
			echo "no";
		}
		else{
			echo "yes";
		}
		die;
	}

	public function UserExist($username) {
		$username=mysql_real_escape_string($username);
		$output= $this->User->find('count', array('conditions' => array('username' => $username)));

		if($output==0){
			echo "no";
		}
		else{
			echo "yes";
		}
		die;
	}

	public function UserLogin(){
	
		$userName=mysql_real_escape_string($this->data['userName']);
		$userPassword=md5($this->data['userPassword']);

		$data= $this->User->find('first',array('fields'=>'id,acc_type,full_name,	username,email_address,picture','conditions' => array('username' => $userName,'password'=>$userPassword)));

		if(!empty($data)){
			$this->Session->write('CurUser',$data['User']);
			echo "yes";
		}
		die;
	}	
}