<?php #Bootstrap

class Bootstrap {

 private $reg;
 
 public function __construct ($cnfg) {
	$this->reg = Registry::getInstance();
	$this->reg->set('config',  $cnfg);
 }
 
 public function run() {

  // View
  $template = new Template();
  $this->reg->set('template', $template);

  // Загружаем router
  $router = new Router();
  $this->reg->set('router', $router);

  // Controller
  $router->setPath(site_path . 'Controllers');
  $router->delegate();
 
 }

}

?>