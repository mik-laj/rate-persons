<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Persons'), ['controller' => 'Persons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'Persons', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="categories index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('slug') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $category): ?>
        <tr>
            <td><?= $this->Number->format($category->id) ?></td>
            <td><?= h($category->name) ?></td>
            <td><?= h($category->slug) ?></td>
            <td class="actions">
                <?= $this->Html->link(
                    '<i class="fa fa-eye" title="'.__('View').'"></i>',
                    ['action' => 'view', $category->id],
                    ['escape' => false]) ?>
                <?= $this->Html->link(
                    '<i class="fa fa-pencil" title="'.__('Edit').'"></i>',
                    ['action' => 'edit', $category->id],
                    ['escape' => false]) ?>
                <?= $this->Form->postLink(
                    '<i class="fa fa-trash-o" title="'.__('Delete').'"></i>',
                    ['action' => 'delete', $category->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $category->id), 'escape' => false]) ?>
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
