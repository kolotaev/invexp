<?php
class ControllerCabinet extends ControllerBase
{

    public function index() {
        $this->checkAuthAndGo('users/cabinet');
    }

}