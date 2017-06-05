<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="posts form">
    <?= $this->Form->create($post) ?>
    <fieldset>
        <legend><?= __($this->request->plugin.'/'.$postType.'/'.ucfirst($this->request->action)) ?></legend>
        <?php
        echo $this->Form->input('title');
        echo $this->Form->input('post_type_id', ['type' => 'hidden']); 
        echo $this->Form->control('categories._ids', ['options' => $categories]);
        echo $this->Form->input('body'); 
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
    <?= $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn btn-default'])?>
    <?= $this->Form->end() ?>
</div>