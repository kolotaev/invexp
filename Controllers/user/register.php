<?php
class ControllerRegister extends ControllerBase {
	
	public function initmodel() {
	$this->model = new DbModel();
	}
	
	public function index() {
	//session_start();
	//$this->registry->get('template')->set('first_name', $_SESSION['xml']);
	$this->registry->get('template')->show('users/register-form');
	}
	
	public function checklogin() {
	//$this->s = $_REQUEST['upass'];
	if ($this->validate() == false) return;
	//$this->registry->get('template')->set('name', $this->s);
	$this->registry->get('template')->show('users/name');
	}
	
	private function validate() {
	 foreach ($_REQUEST as $data) {
	  if ($data==="") { $this->registry->get('template')->show('errors/error'); return false; }
	  else { 
	   try { $this->model->newuser(); }
	   catch (Exception $e) { 
							 $this->registry->get('template')->set('errormessage', $e);
							 $this->registry->get('template')->show('errors/error');
							 return false;
							}
	  }
	 }
	return true;
	}
	 
}
?>