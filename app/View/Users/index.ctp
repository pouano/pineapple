<!-- File: /app/View/Users/index.ctp -->
<?php //debug($posts); ?>
<div class="row" style="margin-top:5px;margin-bottom:5px;">
    <div class="col-xs-5 col-md-3">
        <h1 style="display:inline;margin-right:5px;">Users</h1>
        <?php echo $this->Html->link('<button type="button" class="btn btn-primary" style="margin:0px;">Add User</button>', array('controller' => 'users', 'action' => 'add'), array('escape' => false)); 
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

    <!-- ここから、$users配列をループして、カテゴリーの情報を表示 -->

    <?php foreach ($users as $user){ ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($user['User']['username'],'#'); ?>
            <?php if (isset($user['Image'][0])){ ?>
            <img src="/cakephp/files/image/photo_user/<?php echo $user['Image'][0]['dir']; ?>/thumb80_<?php echo $user['Image'][0]['photo_user']; ?>" />
            <?php } ?>
        </td>
        <td><?php echo $user['User']['created']; ?></td>
        <td><?php echo $this->Html->link('<button type="button" class="btn btn-success">Edit</button>', array('controller' => 'users', 'action' => 'edit', $user['User']['id']), array('escape' => false)); ?>
            <?php echo $this->Form->postLink(
                '<button type="button" class="btn btn-danger">Delete</button>',
                array('action' => 'delete', $user['User']['id']),
                array('confirm' => 'Are you sure?','escape' => false));
            ?>

        </td>
    </tr>
    <?php } ?>
    <?php unset($user); ?>
</table>