<!-- File: /app/View/Posts/index.ctp -->
<?php //debug($posts); ?>
<div class="row" style="margin-top:5px;margin-bottom:5px;">
    <div class="col-xs-5 col-md-3">
        <h1 style="display:inline;margin-right:5px;">Categories</h1>
        <?php echo $this->Html->link('<button type="button" class="btn btn-primary" style="margin:0px;">Add Category</button>', array('controller' => 'categories', 'action' => 'add'), array('escape' => false)); 
        ?>
    </div>
</div><!-- class="row" -->

<table class="table table-bordered table-hover">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Created</th>
        <th>Action</th>
    </tr>

    <!-- ここから、$categories配列をループして、カテゴリーの情報を表示 -->

    <?php foreach ($categories as $category){ ?>
    <tr>
        <td><?php echo $category['Category']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($category['Category']['name'],'#'); ?>
        </td>
        <td><?php echo $category['Category']['created']; ?></td>
        <td><?php echo $this->Html->link('<button type="button" class="btn btn-success">Edit</button>', array('controller' => 'categories', 'action' => 'edit', $category['Category']['id']), array('escape' => false)); ?>
            <?php echo $this->Form->postLink(
                '<button type="button" class="btn btn-danger">Delete</button>',
                array('action' => 'delete', $category['Category']['id']),
                array('confirm' => 'Are you sure?','escape' => false));
            ?>

        </td>
    </tr>
    <?php } ?>
    <?php unset($post); ?>
</table>