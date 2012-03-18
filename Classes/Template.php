<?php

Class Template {

    private $reg;
    private $vars = array();

    public function __construct() {
        $this->reg = Registry::getInstance();
    }

    public function set($varname, $value, $overwrite = false) {
        if (isset($this->vars[$varname]) == true AND $overwrite == false) {
            trigger_error('Unable to set var `' . $varname . '`. Already set, and overwrite not allowed.', E_USER_NOTICE);
            return false;
        }

        $this->vars[$varname] = $value;
        return true;
    }

    public function remove($varname) {
        unset($this->vars[$varname]);
        return true;
    }

    public function show($name) {
        $path = SITE_PATH . 'Templates' . DIRSEP . $name . '.php';

        if (file_exists($path) === false) {
            trigger_error('Template `' . $name . '` does not exist.', E_USER_NOTICE);
            return false;
        }

        // Load variables
        foreach ($this->vars as $key => $value) {
            $$key = $value; // Creates variables, available in different template-views
        }

        include ($path);
        return true;
    }

    // Shows warning box on the page (in the paticular template
    // type <? echo $warning_box; > inside the $(document).ready(function() { }
    public function warningBox($msg) {
        $this->vars['warning_box'] = <<<EOD
$("body").append('<div id="veil"></div>');
$("#info div").append('<div class="warningbox"></div>');
$("#info div.warningbox").append('<div class="capture"> Предупреждение! </div>');
$("#info div.warningbox").append('<div class="message"> $msg </div>');
$("#info div.warningbox").append('<button class="okbutton"> OK </button>');
$(".okbutton").click(function(){
$("#info div.warningbox").remove();
$("#veil").remove();
});
EOD;
    }

}