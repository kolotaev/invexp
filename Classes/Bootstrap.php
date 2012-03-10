<?php #Bootstrap

class Bootstrap {

    private $reg;

    public function __construct($cnfg) {
        $this->reg = Registry::getInstance();
        $this->reg['config'] = $cnfg;
    }

    public function run() {

        //Utils
        $this->utils();

        // View
        $template = new Template();
        $this->reg['template'] = $template;

        // Model (BeanFactory)
        $this->reg['BeanFactory'] = new BeanFactory();

        // Load router
        $router = new Router();
        $this->reg['router'] = $router;

        // Controller
        $router->setPath(SITE_PATH . 'Controllers');
        $router->delegate();

    }

    private function utils() {
        session_start();
    }

}