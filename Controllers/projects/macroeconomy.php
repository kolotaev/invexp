<?php
class ControllerMacroEconomy extends ControllerProjectsBase {

    public function __construct() {
        parent::__construct();
        $this->getModel("projects.macroeconomybean.mg");
    }

    public function index() {
        $this->checkAuthProjectAndGo();
        $this->showMain();
    }

    public function showMain() {
        $this->template->show('around/macroeconomy');
    }
}