<?php
class ControllerLogin extends ControllerBase {

	public function initmodel() {
	$this->model = new DbModel();
	}
	
	public function index() {
	//session_start();
	//$this->registry->get('template')->set('first_name', $_SESSION['xml']);
	
	//$a = BeanFactory::build("XBean");
	$a = BeanFactory::build("Beans_X");
	$a->test();
	$b = new Beans_XBean();
	$b->test();
	$this->registry->get('template')->show('users/login-form');
	}
	 
}
?>