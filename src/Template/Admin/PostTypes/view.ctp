<div class="postTypes view">
    <h2><?= h($postType->title) ?></h2>
    <div class="non-text">
        <div class="strings">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><?= __('Title') ?></h3></div>
                <div class="panel-body"><?= h($postType->title) ?></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><?= __('Slug') ?></h3></div>
                <div class="panel-body"><?= h($postType->slug) ?></div>
            </div>
        </div>
        <div class="numbers">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><?= __('Id') ?></h3></div>
                <div class="panel-body"><?= $this->Number->format($postType->id) ?></div>
            </div>
        </div>
    </div>
    <div class="texts">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><?= __('Body') ?></h3></div>
            <div class="panel-body"><?= $this->Text->autoParagraph(h($postType->body)) ?></div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><?= __('Metadescription') ?></h3></div>
            <div class="panel-body"><?= $this->Text->autoParagraph(h($postType->metadescription)) ?></div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><?= __('Metakeywords') ?></h3></div>
            <div class="panel-body"><?= $this->Text->autoParagraph(h($postType->metakeywords)) ?></div>
        </div>
    </div>
</div>
<div class="related row">
    <div class="col-md-12">
    <h4 class="subheader"><?= __('Related Categories') ?></h4>
    <?php if (!empty($postType->categories)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-condensed table-striped">
            <tr>
                                    <th><?= __('Id') ?></th>
                                    <th><?= __('Post Type Id') ?></th>
                                    <th><?= __('Parent Id') ?></th>
                                    <th><?= __('Lft') ?></th>
                                    <th><?= __('Rght') ?></th>
                                    <th><?= __('Name') ?></th>
                                    <th><?= __('Description') ?></th>
                                    <th><?= __('Created') ?></th>
                                    <th><?= __('Modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($postType->categories as $categories): ?>
            <tr>
                                    <td><?= h($categories->id) ?></td>
                                                        <td><?= h($categories->post_type_id) ?></td>
                                                        <td><?= h($categories->parent_id) ?></td>
                                                        <td><?= h($categories->lft) ?></td>
                                                        <td><?= h($categories->rght) ?></td>
                                                        <td><?= h($categories->name) ?></td>
                                                        <td><?= h($categories->description) ?></td>
                                                        <td><?= $this->Time->timeAgoInWords($categories->created) ?></td>
                                                        <td><?= $this->Time->timeAgoInWords($categories->modified) ?></td>
                    
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Categories', 'action' => 'view', $categories->id], ['class' => 'btn btn-xs btn-default']) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Categories', 'action' => 'edit', $categories->id], ['class' => 'btn btn-xs btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Categories', 'action' => 'delete', $categories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categories->id), 'class' => 'btn btn-xs btn-danger']) ?>
                </td>
            </tr>

            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <div class="alert alert-warning">No related records found.</div>
    <?php endif;?>
    </div>
</div>
