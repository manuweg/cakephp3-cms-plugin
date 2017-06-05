<div class="categories view">
    <h2><?= h($category->name) ?></h2>
    <div class="non-text">
        <div class="strings">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><?= __('Post Type') ?></h3></div>
                <div class="panel-body"><?= $category->has('post_type') ? $this->Html->link($category->post_type->title, ['controller' => 'PostTypes', 'action' => 'view', $category->post_type->id]) : '' ?></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><?= __('Parent Category') ?></h3></div>
                <div class="panel-body"><?= $category->has('parent_category') ? $this->Html->link($category->parent_category->name, ['controller' => 'Categories', 'action' => 'view', $category->parent_category->id]) : '' ?></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><?= __('Name') ?></h3></div>
                <div class="panel-body"><?= h($category->name) ?></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><?= __('Description') ?></h3></div>
                <div class="panel-body"><?= h($category->description) ?></div>
            </div>
        </div>
        <div class="numbers">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><?= __('Id') ?></h3></div>
                <div class="panel-body"><?= $this->Number->format($category->id) ?></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><?= __('Lft') ?></h3></div>
                <div class="panel-body"><?= $this->Number->format($category->lft) ?></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><?= __('Rght') ?></h3></div>
                <div class="panel-body"><?= $this->Number->format($category->rght) ?></div>
            </div>
        </div>
        <div class="dates">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><?= __('Created') ?></h3></div>
                <div class="panel-body"><?= $this->Time->timeAgoInWords($category->created) ?></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><?= __('Modified') ?></h3></div>
                <div class="panel-body"><?= $this->Time->timeAgoInWords($category->modified) ?></div>
            </div>
        </div>
    </div>
</div>
<div class="related row">
    <div class="col-md-12">
    <h4 class="subheader"><?= __('Related Categories') ?></h4>
    <?php if (!empty($category->child_categories)): ?>
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
            <?php foreach ($category->child_categories as $childCategories): ?>
            <tr>
                                    <td><?= h($childCategories->id) ?></td>
                                                        <td><?= h($childCategories->post_type_id) ?></td>
                                                        <td><?= h($childCategories->parent_id) ?></td>
                                                        <td><?= h($childCategories->lft) ?></td>
                                                        <td><?= h($childCategories->rght) ?></td>
                                                        <td><?= h($childCategories->name) ?></td>
                                                        <td><?= h($childCategories->description) ?></td>
                                                        <td><?= $this->Time->timeAgoInWords($childCategories->created) ?></td>
                                                        <td><?= $this->Time->timeAgoInWords($childCategories->modified) ?></td>
                    
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Categories', 'action' => 'view', $childCategories->id], ['class' => 'btn btn-xs btn-default']) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Categories', 'action' => 'edit', $childCategories->id], ['class' => 'btn btn-xs btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Categories', 'action' => 'delete', $childCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childCategories->id), 'class' => 'btn btn-xs btn-danger']) ?>
                </td>
            </tr>

            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <div class="alert alert-warning">No related records found.</div>
    <?php endif;?>
    </div>
</div>
<div class="related row">
    <div class="col-md-12">
    <h4 class="subheader"><?= __('Related Posts') ?></h4>
    <?php if (!empty($category->posts)): ?>
        <table cellpadding="0" cellspacing="0" class="table table-condensed table-striped">
            <tr>
                                    <th><?= __('Id') ?></th>
                                    <th><?= __('Title') ?></th>
                                    <th><?= __('Body') ?></th>
                                    <th><?= __('Category Id') ?></th>
                                    <th><?= __('Created') ?></th>
                                    <th><?= __('Modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($category->posts as $posts): ?>
            <tr>
                                    <td><?= h($posts->id) ?></td>
                                                        <td><?= h($posts->title) ?></td>
                                                        <td><?= h($posts->body) ?></td>
                                                        <td><?= h($posts->category_id) ?></td>
                                                        <td><?= $this->Time->timeAgoInWords($posts->created) ?></td>
                                                        <td><?= $this->Time->timeAgoInWords($posts->modified) ?></td>
                    
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Posts', 'action' => 'view', $posts->id], ['class' => 'btn btn-xs btn-default']) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Posts', 'action' => 'edit', $posts->id], ['class' => 'btn btn-xs btn-default']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Posts', 'action' => 'delete', $posts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $posts->id), 'class' => 'btn btn-xs btn-danger']) ?>
                </td>
            </tr>

            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <div class="alert alert-warning">No related records found.</div>
    <?php endif;?>
    </div>
</div>
