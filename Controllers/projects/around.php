<?php
class ControllerAround extends ControllerProjectsBase
{

    public function __construct() {
        parent::__construct();
        $this->getModel("projects.aroundbean.mg");
    }

    public function index() {
        $this->showMacro();
    }

    public function showMacro() {
        $this->checkAuthProjectAndGo();
        $data = $this->Model->getField('around.macro.*');
        $this->template->set('data', $data);
        $this->template->show('around/macroeconomy');
    }

    public function showMicro() {
        $this->checkAuthProjectAndGo();
        $data = $this->Model->getField('around.micro.*');
        $this->template->set('data', $data);
        $this->template->show('around/microeconomy');
    }

}