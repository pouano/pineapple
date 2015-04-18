<!-- File: /app/View/Users/add.ctp -->
<div class="container">

	<div class="page-header">
		<h1>Add User</h1>
	</div>

	<div class="well">
	<?php
	echo $this->Form->create('User',array('role'=>'form','type' => 'file'));
	echo $this->Form->input('group_id',array('div' => array('class'=>'form-group'),'class'=>'form-control','options'=>$groups));
	echo $this->Form->input('username',array('div' => array('class'=>'form-group'),'class'=>'form-control'));
	echo $this->Form->input('password',array('div' => array('class'=>'form-group'),'class'=>'form-control'));

	echo $this->Form->hidden('Image.0.model', array('value'=>'Person'));
	echo $this->Form->input('Image.0.photo_user', array('type' => 'file'));

	echo $this->Form->button('<span class="glyphicon glyphicon-ok"></span> Save User',array('type'=>'submit','class'=>'btn btn-primary','label'=>false,'escape'=>false));
	
	echo $this->Form->end();

	?>


	</div>
</div>
