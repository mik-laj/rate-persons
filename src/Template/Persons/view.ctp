<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Person'), ['action' => 'edit', $person->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Person'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Persons'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Person'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Votes Single'), ['controller' => 'VotesSingle', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Votes Single'), ['controller' => 'VotesSingle', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="persons view large-10 medium-9 columns">
    <h2><?= h($person->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($person->name) ?></p>
            <h6 class="subheader"><?= __('Slug') ?></h6>
            <p><?= h($person->slug) ?></p>
            <h6 class="subheader"><?= __('Sex') ?></h6>
            <p><?= h($person->sex) ?></p>
            <h6 class="subheader"><?= __('Picture Url') ?></h6>
            <p><?= h($person->picture_url) ?></p>
            <h6 class="subheader"><?= __('Link') ?></h6>
            <p><?= h($person->link) ?></p>
            <h6 class="subheader"><?= __('Category') ?></h6>
            <p><?= $person->has('category') ? $this->Html->link($person->category->name, ['controller' => 'Categories', 'action' => 'view', $person->category->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($person->id) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Html') ?></h6>
            <?= $this->Text->autoParagraph(h($person->html)) ?>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Votes Single') ?></h4>
    <?php if (!empty($person->votes_single)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Person Id') ?></th>
            <th><?= __('Votes Id') ?></th>
            <th><?= __('Opinion') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($person->votes_single as $votesSingle): ?>
        <tr>
            <td><?= h($votesSingle->id) ?></td>
            <td><?= h($votesSingle->person_id) ?></td>
            <td><?= h($votesSingle->votes_id) ?></td>
            <td><?= h($votesSingle->opinion) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'VotesSingle', 'action' => 'view', $votesSingle->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'VotesSingle', 'action' => 'edit', $votesSingle->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'VotesSingle', 'action' => 'delete', $votesSingle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $votesSingle->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
