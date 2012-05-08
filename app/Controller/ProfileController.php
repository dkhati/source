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
class ProfileController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Profile';

/**
 * Default helper
 *
 * @var array
 */
	public $helpers = array('Image','Html', 'Session');

	public $uses = array('User');

	public $layout='fullLayout';

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function index($username=null) {
		$this->set('title_for_layout','Profile Resume');
		$data=$this->User->find('first', array('fields'=>'id,full_name,picture,web,bio','conditions' => array('username' => $username)));
		
		if(empty($data)){
			$this->redirect('/');
		}

		$this->set('data',$data);
	}

	public function edit() {
		$this->set('title_for_layout','Consultant New User');
	}

}
