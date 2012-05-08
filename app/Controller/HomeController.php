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
class HomeController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Home';

/**
 * Default helper
 *
 * @var array
 */
	public $helpers = array('Html', 'Session');

	public $uses = array('User');

	public $layout='default';

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function index() {

		$this->set('title_for_layout','Front Page');

		if(!empty($this->request->data)){	
			
			$data= $this->User->find('first',array('fields'=>'id,acc_type,full_name,	username,email_address,picture','conditions' => array('OR'=>array('username' => $this->request->data['User']['username'],'email_address'=>$this->request->data['User']['username']),'password'=>md5($this->request->data['User']['password']))));

			if(!empty($data)){
				$this->Session->write('CurUser',$data['User']);
				$this->redirect('/settings');
			}
			else{
				$this->Session->setFlash('Wrong username/email and password combination.');				
				$this->redirect('/signin');
			}
		}
	}
}
