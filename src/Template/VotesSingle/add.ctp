<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Votes Single'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Persons'), ['controller' => 'Persons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'Persons', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Votes'), ['controller' => 'Votes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vote'), ['controller' => 'Votes', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="votesSingle form large-10 medium-9 columns">
    <?= $this->Form->create($votesSingle) ?>
    <fieldset>
        <legend><?= __('Add Votes Single') ?></legend>
        <?php
            echo $this->Form->input('person_id', ['options' => $persons]);
            echo $this->Form->input('votes_id', ['options' => $votes]);
            echo $this->Form->input('opinion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
