<?php

App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {


    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty'
        ),
    );


    public $belongsTo = array(
    	'Group' => array(
    		'className' => 'Group',
    		'foreignKey' => 'group_id'
    	)

    );

    public $hasMany = array(
        'Image' => array(
            'className' => 'Attachment',
            'foreignKey' => 'foreign_key',
            'conditions' => array(
                'Image.model' => 'Person',
            ),
        ),
    );
    
    public $actsAs = array('Acl' => array('type' => 'requester'));

    public function beforeSave() {
        $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        return true;
    }

    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
    }

    function bindNode($user) {
        return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
    }
}

?>