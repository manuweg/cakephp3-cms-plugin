<h3><?= $this->request->plugin.' / '.$this->request->controller.' / '.ucfirst($postType) ?></h3>

<div class="buttons">
    <?= $this->Html->link('New '.ucfirst($postType).' '.Cake\Utility\Inflector::singularize($this->request->controller), ['action' => 'add'], ['class' => 'btn btn-primary']);?>
</div>

<?php 
if(count($posts) > 0) {

echo $this->element('Tables/filter'); ?>

<div class="posts index">
    <table cellpadding="0" cellspacing="0" class="table table-hover table-striped">
    <thead>
        <tr>
            <th class="number"><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('title') ?></th>
            <th class="number"><?= $this->Paginator->sort('post_type_id') ?></th>
            <th class="time"><?= $this->Paginator->sort('created') ?></th>
            <th class="time"><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($posts as $post): ?>
        <tr>
            <td class="number"><?= $this->Number->format($post->id) ?></td>
            <td><?= h($post->title)?></td>
            <td><?php //pr($post) ?>
                <?= $post->has('post_type') ? $this->Html->link($post->post_type->title, ['controller' => 'PostTypes', 'action' => 'view', $post->post_type->id]) : '' ?>
            </td>
            <td class="time"><?= $this->Time->timeAgoInWords($post->created) ?></td>
            <td class="time"><?= $this->Time->timeAgoInWords($post->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $post->id], ['class' => 'btn btn-default btn-xs']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $post->id], ['class' => 'btn btn-default btn-xs']) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id), 'class' => 'btn btn-xs btn-danger']) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>

    <ul class="pagination">
        <?= $this->Paginator->numbers() ?>
    </ul>
</div>

<?php 
	
} else {
	
	echo '<div class="callout callout-info">';
    echo '<h4>There are no '.$postType.' posts!</h4>';
	echo 'Please '.$this->Html->link(' create one', ['action' => 'add'], ['class' => '']).'.';
	echo '</div>';
}
	
?>
