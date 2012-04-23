<?php
class ControllerInfo extends ControllerBase {

    public function __construct() {
        $this->registry = Registry::getInstance();
        $this->template = $this->registry['template'];
    }

    public function index() {}

    public function author() {
        $this->registry->get('template')->show('infos/author');
    }

    public function howto() {
        $this->registry->get('template')->show('infos/howto');
    }

    public function classify() {
        $this->registry->get('template')->show('infos/classify');
    }

    public function evaluation() {
        $this->registry->get('template')->show('infos/evaluation');
    }

    public function invest() {
        $this->template->show('infos/invest');
    }

}