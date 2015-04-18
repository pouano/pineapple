<ul class="list-group">
	<?php foreach ($categories as $category) { ?>
		<li class="list-group-item">
			<span class="badge"><?php echo $category['Category']['count']; ?></span>
			<?php echo $this->Html->link($category['Category']['name'],
array('controller' => 'posts', 'action' => 'category_index', $category['Category']['id'])); ?>
		</li>
	<?php }?>  
</ul>