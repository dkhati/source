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
class SettingsController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Settings';

/**
 * Default helper
 *
 * @var array
 */
	public $helpers = array('Image','Html', 'Session');

	var $sessionVal='';

	public $uses = array('User','Resume','Notifications','Mobile','Account');

	public $layout='sidebarLayout';

	var $max_size='700';


	function beforeFilter()
    {
        $this->__validateLoginStatus();
    } 


	function __validateLoginStatus()
    {
          if($this->Session->check('CurUser') == false)
          {
			  $this->Session->setFlash('The url you\'ve followed requires you login.');
              $this->redirect('/');             
          }
		  else{		  
			$this->sessionVal=$this->Session->read('CurUser');
		  }
    } 


/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function index() {
		$this->set('title_for_layout','Account');

		$this->User->id = $this->Account->id= $this->sessionVal['id'];

		$userData=$this->User->read(array('username','email_address'));
		$acoountData=$this->Account->read();

		$this->request->data['User']=$userData['User'];
		$this->request->data['Account']=$acoountData['Account'];

		$this->render('account');

	}

	public function account() {

		$this->set('title_for_layout','Account');

		$this->User->id = $this->Account->id= $this->sessionVal['id'];

		if(!empty($this->request->data)){
			
			//save Account table data
			$this->request->data['Account']['id']=$this->sessionVal['id'];
			$this->Account->save($this->request->data);

			$userDataChk=$this->User->read(array('username','email_address'));
			//save User table data
			if(empty($this->request->data['User']['email_address'])){
				$this->Session->setFlash('Please enter email address.');
			}		
			else if($userDataChk['User']['email_address']!=$this->request->data['User']['email_address']){
			
				$resultUsrEmail=$this->User->find('count',array('conditions' => array('id !='=>$this->sessionVal['id'],'email_address' =>$this->request->data['User']['email_address'])));

				if($resultUsrEmail==0){
					$this->User->saveField('email_address',$this->request->data['User']['email_address']);			
				}
			}
			
			if(empty($this->request->data['User']['username'])){
				$this->Session->setFlash('Please enter username.');
			}
			elseif($userDataChk['User']['username']!=$this->request->data['User']['username']){
				$resultUsr=	$this->User->find('count',array('conditions' => array('id !='=>$this->sessionVal['id'],'username' =>$this->request->data['User']['username'])));

				if($resultUsr==0){
					$this->User->saveField('username',$this->request->data['User']['username']);			
				}
			}
		}
		
		$userData=$this->User->read(array('username','email_address'));
		$acoountData=$this->Account->read();

		$this->request->data['User']=$userData['User'];
		$this->request->data['Account']=$acoountData['Account'];
	}


	public function notifications() {

		$this->set('title_for_layout','Notifications');

		if(!empty($this->data)){		
			$this->request->data['Notifications']['id']=$this->sessionVal['id'];
			$this->Notifications->save($this->data);

			$updated=$this->Notifications->getAffectedRows();
				if($updated){
						$this->Session->setFlash('Notificationst saved successfully.');
				}
		}

		$this->Notifications->id = $this->sessionVal['id'];
		$this->data= $this->Notifications->read();
	}


	public function password() {

		$this->set('title_for_layout','Change your password ');

		if(!empty($this->data)){

		$current_password=md5($this->data['User']['current_password']);
				
		$userId=$this->sessionVal['id'];

		$data= $this->User->find('count',array('conditions' => array('id' => $userId,'status'=>1,'password '=>$current_password)));

			if($data==0){		
				$this->Session->setFlash('invalid current password.');
			}
			elseif(empty($this->data['User']['new_password'])  or strlen($this->data['User']['new_password'])<6 ){
					$this->Session->setFlash('New Password must not be blank or password must be at least six characters.');
			}
			elseif($this->data['User']['new_password']!=$this->data['User']['verify_password']){
			
					$this->Session->setFlash('New password does not match with verify password.');
			}
			else{
					$new_password=mysql_real_escape_string($this->data['User']['new_password']);
					$new_password=md5($new_password);
					
					$this->User->query("UPDATE users SET password='$new_password' WHERE id=$userId AND status=1");

					$updated=$this->User->getAffectedRows();

					if($updated){
						$this->Session->setFlash('Password changed successfully.');
					}
			}
		}
	}
	
	function forgotpassword(){

		if(!empty($this->data['submit'])){

			$emailAddress=$this->sessionVal['email_address'];
			
			$data=$this->User->find('first',array('fields'=>'id,full_name,email_address','conditions' => array('email_address' => $emailAddress)));
			
			if(!empty($data)){

				$fullname=$data['User']['full_name'];
				$email_address=$data['User']['email_address'];

				$fromEmail= Configure::read('AdminEmail');

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
					
					$mailChk=mail($to,'Consultr: password reset',$message,$headers);

					if($mailChk){					
						$this->Session->setFlash('Please check your email to reset password.');		
					}
				}
			}		
		}
		$this->data=array('User'=>array('email_address'=>$this->sessionVal['email_address']));
	}

	public function mobile() {

		$this->set('title_for_layout','Mobile');
		
		if(!empty($this->data)){		
			$this->request->data['Mobile']['id']=$this->sessionVal['id'];
			$this->Mobile->save($this->data);
			$updated=$this->Mobile->getAffectedRows();
				if($updated){
						$this->Session->setFlash('Mobile saved successfully.');
				}
		}

		$this->Mobile->id = $this->sessionVal['id'];
		$this->data= $this->Mobile->read();

	}

	public function profile() { // profile dir profile_images
		$this->set('title_for_layout','Profile');

		$this->User->id = $this->sessionVal['id'];
		
		if(!empty($this->request->data)){	
			
			$file = $this->request->data['User']['picture'];
            unset($this->request->data['User']['picture']);
			
			if(!empty($file['name'])){

				$filename = stripslashes($file['name']);

				$extension = $this->getExtension($filename);
				$extension = strtolower($extension);

				if(($extension != "jpg")&&($extension != "jpeg")&&($extension!="png")&&($extension != "gif")) 
				{
					$this->Session->setFlash('Invalid uploaded file. Please upload  jpg, gif or png type file.');
					$this->redirect('/settings/profile');
				}
				if(filesize($file['tmp_name'])>($this->max_size*1024)){
				
					$this->Session->setFlash('Upload file exceed size limit. Please upload  jpg, gif or png type file.');
					$this->redirect('/settings/profile');
				}
				else{
					$newFileName = $this->sessionVal['id'] . '-' . $file['name'];
					$destination = WWW_ROOT . 'uploads' . DS . $newFileName;
					$this->request->data['User']['picture']=$newFileName;	
			
					if (!file_exists($destination)) {               
						@move_uploaded_file($file['tmp_name'], $destination);				
		            } 
				}
			}
			$this->User->save($this->request->data);

			$updated=$this->User->getAffectedRows();
				if($updated){
					$this->Session->setFlash('Profile saved successfully.');
			}
		}
		$this->request->data= $this->User->read();
		if(!empty($this->request->data['User']['picture'])){

			if($this->request->data['User']['picture']!=$this->sessionVal['picture']){
				$this->Session->write('CurUser.picture',$this->request->data['User']['picture']);
			}

			$this->sessionVal['picture']='abc';

			$this->set('profilePicture',$this->request->data['User']['picture']);
		}
	}

	public function resume() {

		$this->set('title_for_layout','Resume');

		if(!empty($this->data)){		
			$this->request->data['Resume']['id']=$this->sessionVal['id'];
			$this->Resume->save($this->request->data);
			$updated=$this->Resume->getAffectedRows();
				if($updated){
					$this->Session->setFlash('Resume saved successfully.');
				}
		}
		$this->Resume->id = $this->sessionVal['id'];
		$this->data= $this->Resume->read();
	}

	function getExtension($str) {
			 $i = strrpos($str,".");
			 if (!$i) { return ""; }
			 $l = strlen($str) - $i;
			 $ext = substr($str,$i+1,$l);
			 return $ext;
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