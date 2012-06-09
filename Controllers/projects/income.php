<?php
class ControllerIncome extends ControllerProjectsBase
{

    public function __construct() {
        parent::__construct();
        $this->getNativeModel("projects.incomebean.mg");
    }

    public function index() {
        $this->showProducts();
    }

    public function save() {
        $to = $_REQUEST['cell'];
        $new_value = $_REQUEST['data'];
        $num = preg_replace('/(.*)\.(\d*$)/', '$2', $to);

        $this->Model->updateField($to, $new_value);
        $profit = $this->Model->getProductNoNDSProfit($num);
        $cell_data = $this->Model->getField($to);
        $data = array(
            array(
                'cell' => $to,
                'value' => $cell_data,
            ),
            array(
                'cell' => "income.products.sales_profit.$num",
                'value' => $profit,),
        );
        echo json_encode($data);
    }

    public function showProducts() {
        $this->checkAuthProjectAndGo();
        $setts = $this->getSettings($_SESSION['project']);
        for ($n=1; $n <= $setts['n']; $n++) {
            $fake = $this->Model->getProductNoNDSProfit($n);
        }
        $this->template->set('n', $setts['n']);
        $data = $this->Model->getField('income.products.*');
        $this->template->set('data', $data);
        $this->template->show('income/products');
    }

}