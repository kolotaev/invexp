<?php
class ProjectsBeanBase extends BeanBase {
    // the instance of 'projects' db connection
    protected $pr;
    protected $id;

    public function __construct() {
        if (isset($_SESSION['project']))
            $this->id = $_SESSION['project'];
    }

    // sets another project to work with
    public function setProjectId($id) {
        $this->id = $id;
    }

    public function setConnection($connection) {
        parent::setConnection($connection);
        $this->pr = $this->conn->projects;
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

    public function getField($field, $id = '') {
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
}