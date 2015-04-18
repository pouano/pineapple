<!-- File: /app/View/Groups/index.ctp -->
<?php //debug($posts); ?>
<div class="row" style="margin-top:5px;margin-bottom:5px;">
    <div class="col-xs-5 col-md-3">
        <h1 style="display:inline;margin-right:5px;">Groups</h1>
        <?php echo $this->Html->link('<button type="button" class="btn btn-primary" style="margin:0px;">Add Group</button>', array('controller' => 'groups', 'action' => 'add'), array('escape' => false)); 
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

    <!-- ここから、$groups配列をループして、カテゴリーの情報を表示 -->

    <?php foreach ($groups as $group){ ?>
    <tr>
        <td><?php echo $group['Group']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($group['Group']['name'],'#'); ?>
        </td>
        <td><?php echo $group['Group']['created']; ?></td>
        <td><?php echo $this->Html->link('<button type="button" class="btn btn-success">Edit</button>', array('controller' => 'groups', 'action' => 'edit', $group['Group']['id']), array('escape' => false)); ?>
            <?php echo $this->Form->postLink(
                '<button type="button" class="btn btn-danger">Delete</button>',
                array('action' => 'delete', $group['Group']['id']),
                array('confirm' => 'Are you sure?','escape' => false));
            ?>

        </td>
    </tr>
    <?php } ?>
    <?php unset($group); ?>
</table>