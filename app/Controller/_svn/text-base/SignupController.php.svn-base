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
class SignupController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Signup';

/**
 * Default helper
 *
 * @var array
 */
	public $helpers = array('Html', 'Session');

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('User');

	public $layout='default';

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function index() {
		$this->set('title_for_layout','Sign up');
	}

	public function select_account_type(){
		$this->set('title_for_layout','Select account type');	
	}

	function create_account($account_type){
		$this->set('title_for_layout','Create my account');
		
		$account_type_val=array(1,2,3);

		if(!empty($this->request->data) and $this->request->isPost() and in_array($account_type,$account_type_val)){

				$activationCode=md5(rand(1,1000000));
				
				$UserData=array('full_name'=>$this->request->data['User']['full_name'],'password'=>$this->request->data['User']['password'],'email_address'=>$this->request->data['User']['email_address'],'username'=>$this->request->data['User']['username'],'activationCode'=>$activationCode,'acc_type'=>$account_type);

				$this->User->save($UserData);
				
				$validationErrors = $this->User->invalidFields();
				$errorMessages='';
				foreach($validationErrors as $validationErrors){
					if(isset($validationErrors[0])){
						$errorMessages.=$validationErrors[0].'<br>';
					}
				}

				if(!empty($errorMessages)){
					$this->Session->setFlash($errorMessages);				
				}
				
				$insertId=$this->User->getInsertID();

				if($this->request->data['User']['loggedIn']==1){

					$data= $this->User->find('first',array('fields'=>'id,acc_type,full_name,	username,email_address,picture','conditions' => array('id' => $insertId)));
					$this->Session->write('CurUser',$data['User']);

					if(!empty($data)){
						$this->redirect('/settings');
					}
				}				

				if(!empty($insertId)){
						$this->Session->setFlash('Account created successfully.');				
						unset($this->request->data['User']['full_name']);
						unset($this->request->data['User']['email_address']);
						unset($this->request->data['User']['password']);
						unset($this->request->data['User']['username']);
				}
		}	
	}
}
