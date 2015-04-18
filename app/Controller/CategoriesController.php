<?php

class CategoriesController extends AppController {

    public function index() {


        $categories = $this->Category->find('all');

        $this->set(compact('categories'));


    }

    //カテゴリーの追加
    public function add(){
    	//post送信されたら
    	if ($this->request->is('post')) {
            $this->Category->create();
            if ($this->Category->save($this->request->data)) {
                $this->Session->setFlash(__('Your category has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your category.'));
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid category'));
        }

        $category = $this->Category->findById($id);
        if (!$category) {
            throw new NotFoundException(__('Invalid category'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Category->id = $id;
            if ($this->Category->save($this->request->data)) {
                $this->Session->setFlash(__('Your category has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your cateogry.'));
        }

        if (!$this->request->data) {
            //フォームの初期値を$categoryのデータでセットする
            $this->request->data = $category;
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Category->delete($id)) {
            $this->Session->setFlash(__('The category with id: %s has been deleted.', h($id)));
            return $this->redirect(array('action' => 'index'));
        }
    }
}

?>