<h1><?= $this->request->controller?></h1>

<div class="buttons">
    <?= $this->Html->link('New', ['action' => 'add'], ['class' => 'btn btn-primary']);?>
</div>

<div class="filter">
    <?php
    echo $this->Form->create(null, ['class' => 'form-inline']);
    echo $this->Form->input('title');
    echo $this->Form->button('Filter',['type' => 'submit', 'class' => 'btn btn-success']);
    echo $this->Html->link('Reset', ['action' => 'index'], ['class' => 'btn btn-default']);
    echo $this->Form->end();
    ?>
</div>

<div class="postTypes index">
    <table cellpadding="0" cellspacing="0" class="table table-hover table-striped">
    <thead>
        <tr>
            <th class="number"><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('title') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($postTypes as $postType): ?>
        <tr>
            <td class="number"><?= $this->Number->format($postType->id) ?></td>
            <td><?= $this->Html->link(__('New '.h($postType->title).' Post'), ['controller' => 'posts', 'action' => 'add', $postType->slug], ['class' => 'btn btn-lg btn-info']) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $postType->id], ['class' => 'btn btn-default btn-xs']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $postType->id], ['class' => 'btn btn-default btn-xs']) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $postType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $postType->id), 'class' => 'btn btn-xs btn-danger']) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>

    <ul class="pagination">
        <?= $this->Paginator->numbers() ?>
    </ul>
</div>
