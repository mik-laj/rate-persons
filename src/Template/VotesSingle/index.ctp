<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Votes Single'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Persons'), ['controller' => 'Persons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'Persons', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Votes'), ['controller' => 'Votes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vote'), ['controller' => 'Votes', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="votesSingle index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('person_id') ?></th>
            <th><?= $this->Paginator->sort('votes_id') ?></th>
            <th><?= $this->Paginator->sort('opinion') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($votesSingle as $votesSingle): ?>
        <tr>
            <td><?= $this->Number->format($votesSingle->id) ?></td>
            <td>
                <?= $votesSingle->has('person') ? $this->Html->link($votesSingle->person->name, ['controller' => 'Persons', 'action' => 'view', $votesSingle->person->id]) : '' ?>
            </td>
            <td>
                <?= $votesSingle->has('vote') ? $this->Html->link($votesSingle->vote->id, ['controller' => 'Votes', 'action' => 'view', $votesSingle->vote->id]) : '' ?>
            </td>
            <td><?= h($votesSingle->opinion) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $votesSingle->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $votesSingle->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $votesSingle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $votesSingle->id)]) ?>
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
