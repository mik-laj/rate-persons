<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Votes Single'), ['action' => 'edit', $votesSingle->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Votes Single'), ['action' => 'delete', $votesSingle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $votesSingle->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Votes Single'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Votes Single'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Persons'), ['controller' => 'Persons', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'Persons', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Votes'), ['controller' => 'Votes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vote'), ['controller' => 'Votes', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="votesSingle view large-10 medium-9 columns">
    <h2><?= h($votesSingle->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Person') ?></h6>
            <p><?= $votesSingle->has('person') ? $this->Html->link($votesSingle->person->name, ['controller' => 'Persons', 'action' => 'view', $votesSingle->person->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Vote') ?></h6>
            <p><?= $votesSingle->has('vote') ? $this->Html->link($votesSingle->vote->id, ['controller' => 'Votes', 'action' => 'view', $votesSingle->vote->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($votesSingle->id) ?></p>
        </div>
        <div class="large-2 columns booleans end">
            <h6 class="subheader"><?= __('Opinion') ?></h6>
            <p><?= $votesSingle->opinion ? __('Yes') : __('No'); ?></p>
        </div>
    </div>
</div>
