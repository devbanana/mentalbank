<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contract $contract
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Contract'), ['action' => 'edit', $contract->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Contract'), ['action' => 'delete', $contract->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contract->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Contracts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contract'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Mental Banks'), ['controller' => 'MentalBanks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mental Bank'), ['controller' => 'MentalBanks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Value Events'), ['controller' => 'ValueEvents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Value Event'), ['controller' => 'ValueEvents', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="contracts view large-9 medium-8 columns content">
    <h3><?= h($contract->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($contract->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $contract->has('user') ? $this->Html->link($contract->user->username, ['controller' => 'Users', 'action' => 'view', $contract->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mental Bank') ?></th>
            <td><?= $contract->has('mental_bank') ? $this->Html->link($contract->mental_bank->id, ['controller' => 'MentalBanks', 'action' => 'view', $contract->mental_bank->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Goal') ?></th>
            <td><?= $this->Number->format($contract->goal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($contract->date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Value Events') ?></h4>
        <?php if (!empty($contract->value_events)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Value Event') ?></th>
                <th scope="col"><?= __('Multiplier') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Contract Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($contract->value_events as $valueEvents): ?>
            <tr>
                <td><?= h($valueEvents->id) ?></td>
                <td><?= h($valueEvents->value_event) ?></td>
                <td><?= h($valueEvents->multiplier) ?></td>
                <td><?= h($valueEvents->type) ?></td>
                <td><?= h($valueEvents->contract_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ValueEvents', 'action' => 'view', $valueEvents->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ValueEvents', 'action' => 'edit', $valueEvents->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ValueEvents', 'action' => 'delete', $valueEvents->id], ['confirm' => __('Are you sure you want to delete # {0}?', $valueEvents->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
