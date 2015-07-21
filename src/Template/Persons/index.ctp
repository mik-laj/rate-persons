<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Person'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Votes Single'), ['controller' => 'VotesSingle', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Votes Single'), ['controller' => 'VotesSingle', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="persons index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('slug') ?></th>
            <th><?= $this->Paginator->sort('sex') ?></th>
            <th><?= $this->Paginator->sort('picture_url') ?></th>
            <th><?= $this->Paginator->sort('link') ?></th>
            <th><?= $this->Paginator->sort('category_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($persons as $person): ?>
        <tr>
            <td><?= $this->Number->format($person->id) ?></td>
            <td><?= h($person->name) ?></td>
            <td><?= h($person->slug) ?></td>
            <td><?= h($person->sex) ?></td>
            <td><?= h($person->picture_url) ?></td>
            <td><?= h($person->link) ?></td>
            <td>
                <?= $person->has('category') ? $this->Html->link($person->category->name, ['controller' => 'Categories', 'action' => 'view', $person->category->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(
                    '<i class="fa fa-eye" title="'.__('View').'"></i>',
                    ['action' => 'view', $person->id],
                    ["escape" => false])
                ?>
                <?=
                    $this->Html->link(
                    '<i class="fa fa-pencil" title="'.__('Edit').'"></i>',
                    ['action' => 'edit', $person->id],
                    ["escape" => false])
                ?>
                <?= $this->Form->postLink(
                    '<i class="fa fa-trash-o" title="'.__('Delete').'"></i>',
                    ['action' => 'delete', $person->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $person->id), "escape" => false])
                ?>
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
