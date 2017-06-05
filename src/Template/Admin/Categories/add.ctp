<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="categories form">
    <?= $this->Form->create($category) ?>
    <fieldset>
        <legend><?= __($this->request->plugin.'/'.$this->request->controller.'/'.ucfirst($this->request->action)) ?></legend>
        <?php
        echo $this->Form->input('post_type_id', ['options' => $postTypes]);
        echo $this->Form->input('parent_id', ['options' => $parentCategories, 'empty' => true]);
        echo $this->Form->input('name'); 
        echo $this->Form->input('description'); 
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
    <?= $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn btn-default'])?>
    <?= $this->Form->end() ?>
</div>
