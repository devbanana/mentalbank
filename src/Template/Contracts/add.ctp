<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contract $contract
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Contracts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Mental Banks'), ['controller' => 'MentalBanks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mental Bank'), ['controller' => 'MentalBanks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Value Events'), ['controller' => 'ValueEvents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Value Event'), ['controller' => 'ValueEvents', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contracts form large-9 medium-8 columns content">
    <?= $this->Form->create($contract) ?>
    <fieldset>
        <legend><?= __('Add Contract') ?></legend>
        <?php
            echo $this->Form->control('date');
            echo $this->Form->control('goal');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('mental_bank_id', ['options' => $mentalBanks]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
