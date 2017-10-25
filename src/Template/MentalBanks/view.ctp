<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MentalBank $mentalBank
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mental Bank'), ['action' => 'edit', $mentalBank->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mental Bank'), ['action' => 'delete', $mentalBank->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mentalBank->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mental Banks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mental Bank'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contracts'), ['controller' => 'Contracts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contract'), ['controller' => 'Contracts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mentalBanks view large-9 medium-8 columns content">
    <h3><?= h($mentalBank->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Contract') ?></th>
            <td><?= $mentalBank->has('contract') ? $this->Html->link($mentalBank->contract->id, ['controller' => 'Contracts', 'action' => 'view', $mentalBank->contract->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $mentalBank->has('user') ? $this->Html->link($mentalBank->user->id, ['controller' => 'Users', 'action' => 'view', $mentalBank->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mentalBank->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Balance') ?></th>
            <td><?= $this->Number->format($mentalBank->balance) ?></td>
        </tr>
    </table>
</div>
