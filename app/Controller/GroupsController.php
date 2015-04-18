<?php

class GroupsController extends AppController {

    function beforeFilter() {
        //parent::beforeFilter();
        //$this->Auth->allow();
    }
    
    public function index() {


        $groups = $this->Group->find('all');

        $this->set(compact('groups'));


    }

    //カテゴリーの追加
    public function add(){
    	//post送信されたら
    	if ($this->request->is('post')) {
            $this->Group->create();
            if ($this->Group->save($this->request->data)) {
                $this->Session->setFlash(__('Your group has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your group.'));
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid group'));
        }

        $group = $this->Group->findById($id);
        if (!$group) {
            throw new NotFoundException(__('Invalid group'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Group->id = $id;
            if ($this->Group->save($this->request->data)) {
                $this->Session->setFlash(__('Your group has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your group.'));
        }

        if (!$this->request->data) {
            //フォームの初期値を$groupのデータでセットする
            $this->request->data = $group;
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Group->delete($id)) {
            $this->Session->setFlash(__('The group with id: %s has been deleted.', h($id)));
            return $this->redirect(array('action' => 'index'));
        }
    }
}

?>