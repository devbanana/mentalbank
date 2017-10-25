<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contract[]|\Cake\Collection\CollectionInterface $contracts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Contract'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Mental Banks'), ['controller' => 'MentalBanks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mental Bank'), ['controller' => 'MentalBanks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Value Events'), ['controller' => 'ValueEvents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Value Event'), ['controller' => 'ValueEvents', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contracts index large-9 medium-8 columns content">
    <h3><?= __('Contracts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('goal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mental_bank_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contracts as $contract): ?>
            <tr>
                <td><?= h($contract->id) ?></td>
                <td><?= h($contract->date) ?></td>
                <td><?= $this->Number->format($contract->goal) ?></td>
                <td><?= $contract->has('user') ? $this->Html->link($contract->user->username, ['controller' => 'Users', 'action' => 'view', $contract->user->id]) : '' ?></td>
                <td><?= $contract->has('mental_bank') ? $this->Html->link($contract->mental_bank->id, ['controller' => 'MentalBanks', 'action' => 'view', $contract->mental_bank->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $contract->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contract->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contract->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contract->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
