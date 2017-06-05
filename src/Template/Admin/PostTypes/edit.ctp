<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="postTypes form">
    <?= $this->Form->create($postType) ?>
    <fieldset>
        <legend><?= __('Edit Post Type') ?></legend>
        <?php
        echo $this->Form->input('title'); 
        echo $this->Form->input('slug'); 
        echo $this->Form->input('body'); 
        echo $this->Form->input('metadescription'); 
        echo $this->Form->input('metakeywords'); 
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
    <?= $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn btn-default'])?>
    <?= $this->Form->end() ?>
</div>
