<?php

class PostsController extends AppController {
    //public $helpers = array('Html', 'Form');

    public $components = array('Search.Prg');
    public $uses = array('Post','Category');
    public $paginate = array('Post' => array('limit' => 5));

    public function index() {


        $categories = $this->_get_categories_append_count();

        $this->Prg->commonProcess();

        $conditions = $this->Post->parseCriteria($this->passedArgs);

        
        //$posts = $this->Post->find('all',array('conditions'=>$conditions));

        $posts = $this->paginate('Post',$conditions);

        $this->set(compact('posts','categories'));


    }

    public function category_index($category_id = null){
        //categoriesデータ取得
        
        $categories = $this->_get_categories_append_count();

        $conditions = array('category_id' => $category_id);

        $posts = $this->Post->find('all',array('conditions'=>$conditions));

        $this->set(compact('posts','categories'));

    }

    public function view($id = null){

        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        //$this->set('post', $post);
		$this->set(compact('post'));


    }

    //ブログ記事の追加
    public function add(){

        //categoriesデータ取得
        $categories = $this->Category->find('list');

        $this->set(compact('categories'));
        
        //debug($categories);

    	//post送信されたら
    	if ($this->request->is('post')) {
            $this->Post->create();
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your post.'));
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Post->id = $id;
            //debug('postされた');
            //debug($this->request->data);
            if ($this->Post->save($this->request->data)) {
                 $this->Session->setFlash(__('Your post has been updated.'));
                 return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your post.'));
        }

        if (!$this->request->data) {
            //フォームの初期値を$postのデータでセットする
            $this->request->data = $post;
            //debug('postされてない');
            //debug($this->request->data);
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Post->delete($id)) {
            $this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)));
            return $this->redirect(array('action' => 'index'));
        }
    }

    private function _get_categories_append_count(){
        $categories = $this->Category->find('all');

        $index = 0;
        foreach ($categories as $category) {
            $postcount = $this->Post->find('count',array('conditions'=>array('category_id'=>$category['Category']['id'])));
            //debug($postcount);
            $categories[$index]['Category']['count'] = $postcount;
            $index++;
        }

        return $categories;
    }
}

?>