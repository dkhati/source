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
class SigninController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Signin';

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

		$this->set('title_for_layout','Sign In');

		if(!empty($this->request->data) and $this->request->isPost()){

			$data= $this->User->find('first',array('fields'=>'id,acc_type,full_name,	username,email_address,picture','conditions' => array('OR'=>array('username' => $this->request->data['User']['email_address'],'email_address'=>$this->request->data['User']['email_address']),'password'=>md5($this->request->data['User']['password']))));

			if(!empty($data)){
				$this->Session->write('CurUser',$data['User']);
				$this->redirect('/settings');
			}
			else{
				$this->Session->setFlash('Wrong username/email and password combination.');		
			}
		}
	}

	function password_recovery(){
		$this->set('title_for_layout','Password Recovery');


		if(empty($this->request->data['User']['username']) and  empty($this->request->data['User']['email_address'])){
			$this->Session->setFlash('Please enter username or email address.');				
		}
		elseif(!empty($this->request->data) and $this->request->isPost()){

			$userName=$this->request->data['User']['username'];
			$email_address=$this->request->data['User']['email_address'];

			$data= $this->User->find('first',array('fields'=>'id,email_address','conditions' => array('OR'=>array('username' => $userName,'email_address'=>$email_address),'status'=>1)));	
			
			if(!empty($data)){

				$token=md5($this->keygen());
				
				$UserData=array('activationCode'=>$token);
				$this->User->id=$data['User']['id'];
				$this->User->save($UserData);

				$UserId=$data['User']['id'];
				
				if(!empty($UserId)){
					$fromEmail= Configure::read('AdminEmail');

					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers .= "From: $fromEmail" . "\r\n" ."Reply-To: $fromEmail" . "\r\n" .'X-Mailer: PHP/' . phpversion();
					
					$siteUrl='http://'.$_SERVER['HTTP_HOST'];
					
					$activationLink=$siteUrl.$this->base."/signin/password_reset/".$data['User']['email_address']."/$token";
					
					$to=$data['User']['email_address'];

					$message='Consultr has received a request to reset the password for your Consultr account<br> If you want to reset your password, click on the link below (or copy and paste the URL into your browser):<br><a href="'.$activationLink.'">'.$activationLink.'</a><br>';
					
					mail($to,'Consultr: password reset',$message,$headers);
					
					unset($this->request->data['User']['username']);
					unset($this->request->data['User']['email_address']);					
				}
				$this->redirect('/signin/password_reset_sent');
			}
			else{
				$this->Session->setFlash('Username or email address does not exist.');		
			}		
		}	
	}

	function password_reset_sent(){
		$this->set('title_for_layout','Password reset send.');	
	}

	function password_reset($email_address=NULL,$token=NULL){

			$this->set('title_for_layout','Password reset');

			if(!empty($this->request->data)){
				$this->request->data['User']['password']=trim($this->request->data['User']['password']);

				if(empty($this->request->data['User']['password']) or strlen($this->request->data['User']['password'])<6){
					$this->Session->setFlash('New Password must not be blank or password must be at least six characters.');						
				}
				elseif(empty($this->request->data['User']['passwordVerify'])){
					$this->Session->setFlash('Please enter verify new password.');			
				}
				elseif($this->request->data['User']['password']!=$this->request->data['User']['passwordVerify']){
					$this->Session->setFlash('New password does not match with the verify new password.');	
				}
				else{
					
					$querydata=$this->User->find('first',array('fields'=>'id','conditions' => array('id'=>$this->request->data['User']['id'],'email_address' => $this->request->data['User']['email_address'],'activationCode'=>$this->request->data['User']['activationCode'],'status'=>1)));				

					if(!empty($querydata)){					
						$this->User->id=$querydata['User']['id'];
						
						$UpdateQuery=array('password'=>$this->request->data['User']['password'],'activationCode'=>'');
						
						$this->User->save($UpdateQuery);

						$updated=$this->User->getAffectedRows();
						
						if($updated){
							$this->Session->write('password_reset_confirmation',true);
							$this->redirect('/signin/password_reset_confirmation');
						}
					}
				}
			}else{
				$email_address=mysql_real_escape_string($email_address);
				$token=mysql_real_escape_string($token);				

				$data= $this->User->find('first',array('fields'=>'id,email_address,activationCode','conditions' => array('email_address' => $email_address,'activationCode'=>$token,'status'=>1)));

				$this->data=$data;
			}
	}

	function password_reset_confirmation(){	

		$this->set('title_for_layout','Your password has been changed');	
		
		if($this->Session->check('password_reset_confirmation')){
			$this->Session->delete('password_reset_confirmation');
		}
		else{
			$this->redirect('/');
		}
	}

	function keygen() {
	  $tempstring =
	  "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNO
	  PQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyzABC
	  DEFGHIJKLMNOPQRSTUVWXYZ!?@#$%&*[]{}();:,<>~+=-_
	  /|\\";
	  $pass='';
	  for($length = 0; $length < mt_rand(10, 15); $length++) {
	   $temp = str_shuffle($tempstring);
	   $char = mt_rand(0, strlen($temp));
	   $pass .= $temp[$char];
	  }
	  return $pass;
	}
}