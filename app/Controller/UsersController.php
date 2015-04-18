<?php

class UsersController extends AppController {

    public $uses = array('User','Group');

    function beforeFilter() {
        //parent::beforeFilter();
        //$this->Auth->allow();
    }

    public function index() {


        $users = $this->User->find('all');

        $this->set(compact('users'));


    }

    //ユーザーの追加
    public function add(){

        $groups = $this->Group->find('list');

        $this->set(compact('groups'));
        
    	//post送信されたら
        debug($this->request->data);

    	if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->saveAll($this->request->data)) {
                $this->Session->setFlash(__('Your user has been saved.'));
                //return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your user.'));
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }

        $user = $this->User->findById($id);
        if (!$user) {
            throw new NotFoundException(__('Invalid user'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->User->id = $id;
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Your user has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your user.'));
        }

        if (!$this->request->data) {
            //フォームの初期値を$userのデータでセットする
            $this->request->data = $user;
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->User->delete($id)) {
            $this->Session->setFlash(__('The user with id: %s has been deleted.', h($id)));
            return $this->redirect(array('action' => 'index'));
        }
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash('Your username or password was incorrect.');
            }
        }
    }

    public function logout() {
        $this->Auth->logout();
    }
}

?>