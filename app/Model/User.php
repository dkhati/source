<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppModel', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class User extends AppModel {

/**
 * Validation
 *
 * @var array
 * @access public
 */
    public $validate = array(
        'full_name' => array(
            'rule' => 'notEmpty',
            'message' => 'Please enter full name.',
        ),
        'email_address' => array(
            'email' => array(
                'rule' => 'email',
                'message' => 'Please provide a valid email address.',
            ),
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'Email address already in use.',
            ),
        ),
        'password' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter password.',
            ),
	        'minLength'=>array(
				'rule' => array('minLength', 6),
				'message' => 'Passwords must be at least 6 characters long.',
			),
        ),
       'username' => array(
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'The username has already been taken.',
            ),
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter username.',
            ),
        ),
    );

		 public function beforeSave($options = array()) {
			if (!empty($this->data['User']['password'])) {
				$this->data['User']['password'] = md5($this->data['User']['password']);
			}
			return true;
		}


}