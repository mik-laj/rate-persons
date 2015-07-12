<?php if($persons): ?>
    <div class="stats-list" start="<?php echo $this->Paginator->counter('{{start}}'); ?>">
        <?php foreach ($persons as $person ): ?>
            <div class="stats-list--item">
                    <?= $this->element('personBox', ['person' => $person ]); ?>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
<?php else: ?>
    Sorry, no results.
<?php endif ?>
