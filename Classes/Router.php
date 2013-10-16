<?php # Routes all the calls from browser

Class Router {

    private $registry;
    private $path;

    public function __construct() {
        $this->registry = Registry::getInstance();
        // ToDo: maybe 'cause of this setting to registry further settings should be eliminated
        //$this->registry['template'] = new Template();
    }

    public function setPath($path) {
        $path .= DIRSEP;
        if (is_dir($path) == false) {
            throw new Exception ('Invalid controller path: `' . $path . '`');
        }
        $this->path = $path;
    }

    private function getController(&$file, &$controller, &$action) {
        $route = (empty($_GET['route'])) ? '' : $_GET['route'];

        if (empty($route)) {
            $route = 'index';
        }

        // Get separate parts
        $route = trim($route, '/\\');
        $parts = explode('/', $route);

        // Find right controller
        $cmd_path = $this->path;
        foreach ($parts as $part) {
            $fullpath = $cmd_path . $part;

            // Is there a dir with this path?
            if (is_dir($fullpath)) {
                $cmd_path .= $part . DIRSEP;
                array_shift($parts);
                continue;
            }

            // Find the file
            if (is_file($fullpath . '.php')) {
                $controller = $part;
                array_shift($parts);
                break;
            }
        }

        // Set default controller 'index' if nothing is requested
        if (empty($controller)) {
            $controller = 'index';
        }
        ;

        // Get action
        $action = array_shift($parts);
        if (empty($action)) {
            $action = 'index';
        }

        $file = $cmd_path . $controller . '.php';
        //$args = $parts; // the rest of the request's string
    }

    public function delegate() {
        // Analyze route
        $this->getController($file, $controller, $action);


        // File available?
        if (is_readable($file) == false) {
            $this->registry['template']->show('errors/not-found');
            exit;
            //die ('404 Not Found');
        }

        // Include the file
        require_once ($file);

        // Initiate the class
        // Add word 'Controller' to the classname of the controller, called by name e.g. 'members'
        $class = 'Controller' . $controller;
        $controller = new $class($this->registry);

        // Action available?
        if (is_callable(array($controller, $action)) == false) {
            $this->registry['template']->show('errors/not-found');
            exit;
            //die ('404 Not Found');
        }

        // Clear controller variable
        //$this->request_to_reg();

        // Run action
        $controller->$action();
    }

    // Todo: maybe to delete this function
    // Clear $REQUEST $GET $COOKIE from 'route' element and putting into our registry
    // Deprecated
    private function request_to_reg() {
        $globaldata = array();
        $globaldata = $_REQUEST;
        array_shift($globaldata);
        $this->registry->set('requestdata', $globaldata);

        $globaldata = array();
        $globaldata = $_GET;
        array_shift($globaldata);
        $this->registry->set('getdata', $globaldata);

        $globaldata = array();
        $globaldata = $_POST;
        $this->registry->set('postdata', $globaldata);

        $globaldata = array();
        $globaldata = $_COOKIE;
        $this->registry->set('cookiedata', $globaldata);
    }

}