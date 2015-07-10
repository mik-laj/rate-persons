<div class="vote-box">
    <?= $this->Form->create() ?>
    <h1 class="vote-box-name"><?= $person->name ?></h1>
    <?= $this->Html->image($person->picture_url, ["class"=>"vote-box-image"]) ?>

    <?php if($person->html): ?>
        <p class="vote-box-html"><?= $person->html ?> </p>
    <?php endif; ?>

    <?php if($person->link): ?>
        <p class="vite-box-link"><?= $this->Html->link( $person->link ,"AAAA") ?> </p>
    <?php endif; ?>

    <?= $this->Form->hidden('selection', ['mame'=>'selection', 'value'=> $selection]) ?>
    <?= $this->Form->submit('Kochaj', ["class"=>"button vote-box-button"]);?>
    <?= $this->Form->end() ?>
</div>
