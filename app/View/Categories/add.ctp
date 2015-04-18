<!-- File: /app/View/Categories/add.ctp -->
<div class="container">

	<div class="page-header">
		<h1>Add Category</h1>
	</div>

	<div class="well">
	<?php
	echo $this->Form->create('Category',array('role'=>'form'));
	echo $this->Form->input('name',array('div' => array('class'=>'form-group'),'class'=>'form-control'));
	echo $this->Form->button('<span class="glyphicon glyphicon-ok"></span> Save Category',array('type'=>'submit','class'=>'btn btn-primary','label'=>false,'escape'=>false));
	
	echo $this->Form->end();

	?>


	</div>
</div>
