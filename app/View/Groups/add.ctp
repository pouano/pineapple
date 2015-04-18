<!-- File: /app/View/Groups/add.ctp -->
<div class="container">

	<div class="page-header">
		<h1>Add Group</h1>
	</div>

	<div class="well">
	<?php
	echo $this->Form->create('Group',array('role'=>'form'));
	echo $this->Form->input('name',array('div' => array('class'=>'form-group'),'class'=>'form-control'));
	echo $this->Form->button('<span class="glyphicon glyphicon-ok"></span> Save Group',array('type'=>'submit','class'=>'btn btn-primary','label'=>false,'escape'=>false));
	
	echo $this->Form->end();

	?>


	</div>
</div>
