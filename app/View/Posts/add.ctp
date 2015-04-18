<!-- File: /app/View/Posts/add.ctp -->
<div class="container">

	<div class="page-header">
		<h1>Add Post</h1>
	</div>

	<div class="well">
	<?php
	echo $this->Form->create('Post',array('role'=>'form'));
	echo $this->Form->input('category_id',array('options'=>$categories));
	
	echo $this->Form->input('title',array('div' => array('class'=>'form-group'),'class'=>'form-control'));
	echo $this->Form->input('body', array('rows' => '3','div' => array('class'=>'form-group'),'class'=>'form-control'));

	echo $this->Form->button('<span class="glyphicon glyphicon-ok"></span> Save Post',array('type'=>'submit','class'=>'btn btn-primary','label'=>false,'escape'=>false));
	
	echo $this->Form->end();

	?>


	</div>
</div>
