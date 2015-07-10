<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Vote'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="votes index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('ip') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($votes as $vote): ?>
        <tr>
            <td><?= $this->Number->format($vote->id) ?></td>
            <td><?= h($vote->created) ?></td>
            <td><?= h($vote->ip) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $vote->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vote->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vote->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
