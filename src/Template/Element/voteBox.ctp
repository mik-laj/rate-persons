    <?= $this->Form->create(null, ['action' => 'vote']) ?>
    <?= $this->Form->hidden('selection', ['mame'=>'selection', 'value'=> $selection]) ?>
<div class="person-box">
    <div class="person-box--image">
        <?= $this->Html->image($person->picture_url) ?>
    </div>
    <div class="person-box--content">
        <h3 class="person-box--name">
            <?= $person->name; ?>
        </h3>
        <?php if($person->html): ?>
            <p><?= $person->html ?> </p>
        <?php endif; ?>

        <?php if($person->link): ?>
            <p><?= $this->Html->link( $person->link ,__('Read more')) ?> </p>
        <?php endif; ?>
    </div>
</div>
<?= $this->Form->submit(__('Vote'), ["class"=>"button button-vote"]);?>
<?php $this->Form->end() ?>
