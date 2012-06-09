<?php
class ProjectsBeanBase extends BeanBase {
    // the instance of 'projects' db connection
    protected $pr;
    protected $id;
    protected $pr_settings;

    public function __construct() {
        if (isset($_SESSION['project']))
            $this->id = $_SESSION['project'];
    }

    // ToDo: this is dismiss of architecture: project's settings should be in projects collection (table)
    // so that we can access them in a manner of connection between models (smth. like 'projects.settings.n')
    // Populates the Bean with project settings. Is called from controller. QuickFix.
    public function populateBeanWithProjectSettings($setts) {
        $this->pr_settings = $setts;
    }

    // sets another project to work with
    public function setProjectId($id) {
        $this->id = $id;
    }

    public function setConnection($connection) {
        parent::setConnection($connection);
        $this->pr = $this->conn->projects;
    }

    public function getConnection(){
        return $this->pr;
    }

    // returns an array of data-info for this user;
    public function getAllFields($id) {
        $query = array('_id' => $id);
        $cursor = $this->pr->find($query);
        if (isset($cursor)) {
            return $cursor->getNext();
        }
        else throw new Exception("The Project exists not");
    }

    // Use it to get values of docs & subdocs of your collection
    public function getField($field, $id = '') {
        if ($id == '') {
            $id = $this->id;
        }
        $query = array('_id' => $id);
        $subfields = explode('.', $field);
        $field = preg_replace('/(.*)(\.\*$)/', '$1', $field);
        $cursor = $this->pr->find($query, array($field => 1));
        if (isset($cursor)) {
            $cursor = iterator_to_array($cursor);
            $cursor = $cursor[$id];
            $i = 0;
            while(is_array($cursor) && $subfields[$i] !== '*'){
                $cursor = $cursor[$subfields[$i]];
                $i++;
            }
            return $cursor;
        }
        else throw new Exception("The Project or Requested field exists not");
    }

    public function getFieldInRelation($what, $where, $criteria) {
        $cursor = $this->pr->find(array($where => $criteria), array($what => 1));
        $cursor->sort(array("date" => 1));
        $result = array();
        //var_dump(iterator_to_array(($cursor)));
        foreach ($cursor as $doc) {
            $result[] = $doc[$what];
        }
        return $result;
    }

    public function updateField($field, $newValue, $id = '') {
        if ($id == '') {
            $id = $this->id;
        }
        $query = array('$set' => array($field => $newValue));
        $this->pr->update(array('_id' => $id), $query);
    }

    public function fieldExists($key, $value_to_find) {
        $cursor = $this->pr->find(array(), array($key => 1));
        foreach ($cursor as $doc) {
            if ($doc[$key] == $value_to_find) return true;
        }
        return false;
    }

    //=========================
    // Redundant
    // ToDo: Maybe it's better to do this in model but it's hard seems to me at this time
    public function qqqqqqqqqqqqqsetField($field, $value, $id = '') {
        if ($id == '') {
            $id = $this->id;
        }
        $where = array('_id' => $id);
        $what = array('$set' => array($field => $value));
        try {
            $this->pr->update($where, $what);
        }
        catch(Exception $e){
            throw new Exception($e);
        }
    }

    public function qqqqqqqqgetField($field, $id = '') {
        if ($id == '') {
            $id = $this->id;
        }
        $query = array('_id' => $id);
        $cursor = $this->pr->find($query);
        if (isset($cursor)) {
            $cursor = iterator_to_array($cursor);
            return $cursor[$id][$field];
        }
        else throw new Exception("The Project or Requested field exists not");
    }
    // end ==========================
}