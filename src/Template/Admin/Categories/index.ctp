<h3><?= $this->request->plugin.'/'.$this->request->controller.'/'.ucfirst($this->request->action) ?></h3>

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

<div class="categories index">
    <table cellpadding="0" cellspacing="0" class="table table-hover table-striped">
    <thead>
        <tr>
            <th class="number"><?= $this->Paginator->sort('id') ?></th>
            <th class="number"><?= $this->Paginator->sort('post_type_id') ?></th>
            <th class="number"><?= $this->Paginator->sort('parent_id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('description') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $category): ?>
        <tr>
            <td class="number"><?= $this->Number->format($category->id) ?></td>
            <td>
                <?= $category->has('post_type') ? $this->Html->link($category->post_type->title, ['controller' => 'PostTypes', 'action' => 'view', $category->post_type->id]) : '' ?>
            </td>
            <td>
                <?= $category->has('parent_category') ? $this->Html->link($category->parent_category->name, ['controller' => 'Categories', 'action' => 'view', $category->parent_category->id]) : '' ?>
            </td>
            <td><?= h($category->name)?></td>
            <td><?= h($category->description)?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $category->id], ['class' => 'btn btn-default btn-xs']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $category->id], ['class' => 'btn btn-default btn-xs']) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id), 'class' => 'btn btn-xs btn-danger']) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>

    <ul class="pagination">
        <?= $this->Paginator->numbers() ?>
    </ul>
</div>
