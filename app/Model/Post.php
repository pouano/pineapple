<?php

class Post extends AppModel {

	public $actsAs = array('Search.Searchable');


	public $filterArgs = array(
			'keyword' => array('type'=>'like','field'=>array('Post.title','Post.body')),
		);

    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'notEmpty'
        )
    );

    public $belongsTo = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id'
        )
    );
}

?>