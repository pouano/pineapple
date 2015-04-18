<!-- File: /app/View/Posts/category_index.ctp -->
<?php //debug($posts); ?>
<div class="row" style="margin-top:5px;margin-bottom:5px;">
    <div class="col-xs-4 col-md-3">
        <h1 style="display:inline;margin-right:5px;">Blog posts</h1>
        <?php echo $this->Html->link('<button type="button" class="btn btn-primary" style="margin:0px;">Add Post</button>', array('controller' => 'posts', 'action' => 'add'), array('escape' => false)); 
        ?>
    </div>
</div><!-- class="row" -->
<div class="col-xs-10">
<table class="table table-bordered table-hover">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Category</th>
        <th>Created</th>
        <th>Action</th>
    </tr>

    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->

    <?php foreach ($posts as $post){ ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['Post']['title'],
array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>
        <td><?php echo $post['Category']['name']; ?></td>
        <td><?php echo $post['Post']['created']; ?></td>
        <td><?php echo $this->Html->link('<button type="button" class="btn btn-success">Edit</button>', array('controller' => 'posts', 'action' => 'edit', $post['Post']['id']), array('escape' => false)); ?>
            <?php echo $this->Form->postLink(
                '<button type="button" class="btn btn-danger">Delete</button>',
                array('action' => 'delete', $post['Post']['id']),
                array('confirm' => 'Are you sure?','escape' => false));
            ?>

        </td>
    </tr>
    <?php } ?>
    <?php unset($post); ?>
</table>
</div>
<div class="col-xs-2">
<?php echo $this->Element('sideList'); ?>
</div>