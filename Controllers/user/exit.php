<?php
class ControllerExit extends ControllerBase {

	public function index() {
        $this->logout();
	    $this->template->show('users/exit');
	}

    private function logout() {
        $_SESSION = array();
        unset($_SESSION[session_name()]);
        session_destroy();
    }
	 
}