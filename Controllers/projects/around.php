<?php
class ControllerAround extends ControllerProjectsBase
{

    public function __construct() {
        parent::__construct();
        $this->getNativeModel("projects.aroundbean.mg");
    }

    public function index() {
        $this->showMacro();
    }

    public function save() {
        $to = $_REQUEST['cell'];
        $value = $_REQUEST['data'];
        $this->Model->updateField($to, $value);

        switch ($to) {
            case 'around.micro.credit_volume':
            case 'around.micro.credit_term':
            case 'around.micro.credit_rate':
                $setts = $this->getSettings($_SESSION['project']);
                $this->Model->populateBeanWithProjectSettings($setts);
                $this->Model->calculateCredit();
                break;
            case 'around.micro.amortization':
                $setts = $this->getSettings($_SESSION['project']);
                $this->Model->populateBeanWithProjectSettings($setts);
                $this->Model->calculateAmortization();
                break;
        }

        $cell_data = $this->Model->getField($to);
        $data = array(
            array(
                'cell' => $to,
                'value' => $cell_data,
            )
        );
        echo json_encode($data);
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