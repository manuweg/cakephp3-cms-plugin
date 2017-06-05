<div class="posts view">
    <h2><?= h($post->title) ?></h2>
    <div class="non-text">
        <div class="strings">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><?= __('Title') ?></h3></div>
                <div class="panel-body"><?= h($post->title) ?></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><?= __('Category') ?></h3></div>
                <div class="panel-body"><?= $post->has('category') ? $this->Html->link($post->category->name, ['controller' => 'Categories', 'action' => 'view', $post->category->id]) : '' ?></div>
            </div>
        </div>
        <div class="numbers">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><?= __('Id') ?></h3></div>
                <div class="panel-body"><?= $this->Number->format($post->id) ?></div>
            </div>
        </div>
        <div class="dates">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><?= __('Created') ?></h3></div>
                <div class="panel-body"><?= $this->Time->timeAgoInWords($post->created) ?></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><?= __('Modified') ?></h3></div>
                <div class="panel-body"><?= $this->Time->timeAgoInWords($post->modified) ?></div>
            </div>
        </div>
    </div>
    <div class="texts">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><?= __('Body') ?></h3></div>
            <div class="panel-body"><?= $this->Text->autoParagraph(h($post->body)) ?></div>
        </div>
    </div>
</div>
