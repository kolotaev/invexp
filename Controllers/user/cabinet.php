<?php
class ControllerCabinet extends ControllerBase {

	public function index() {
        if ($this->checkAuth() === '') {
            $this->template->set('warning', "Необходима авторизация!");
            $this->template->show('users/login-form');
        }
        $this->template->show('users/cabinet');
	}
	 
}