<?php

class Group extends AppModel {


    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty'
        ),
    );

    public $actsAs = array('Acl' => array('type' => 'requester'));

    public function parentNode() {
        return null;
    }
}

?>